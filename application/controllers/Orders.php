<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use OpenSpout\Writer\Common\Creator\WriterEntityFactory;
use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;


class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
    }

    public function index()
    {
        $data['products'] = $this->Order_model->get_product();
        $this->load->view('User/index', $data);
    }


    public function store()
    {
        if ($this->input->post()) {

            $product_id = $this->input->post('product_select');
            $product = $this->Order_model->get_product($product_id);

            if (!$product) {
                show_error('Invalid product selected');
                return;
            }

            $data = [
                'product_id'   => $product_id,
                'order_amount' => $product->product_price,
                'user_id'      => $this->session->userdata('user_id'),
            ];

            $inserted = $this->Order_model->insert($data);

            if ($inserted) {
                $data['error'] = "Order placed successfully!";
            } else {
                $data['error'] = "Failed to place order";
            }
        }

        $data['products'] = $this->Order_model->get_product();
        $this->load->view('User/index', $data);
    }

    public function get_orders()
    {
        $draw   = $this->input->post('draw');
        $start  = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];


        $this->db->select('order_tbl.*, product.product_name, product.product_price, users.name as name, users.email, users.phone');
        $this->db->from('order_tbl');
        $this->db->join('product', 'product.id = order_tbl.product_id', 'left');
        $this->db->join('users', 'users.id = order_tbl.user_id', 'left');


        if (!empty($search)) {
            $this->db->group_start();
            $this->db->or_like('product.product_name', $search);
            $this->db->or_like('order_tbl.order_amount', $search);
            $this->db->group_end();
        }


        $totalFiltered = $this->db->count_all_results('', false);


        $this->db->limit($length, $start);
        $query = $this->db->get();
        $data = $query->result();


        $total = $this->db->count_all('order_tbl');


        echo json_encode([
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFiltered,
            "data" => $data
        ]);
    }

    public function export_large()
    {

        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToBrowser("Order_large.xlsx");


        $header = WriterEntityFactory::createRowFromArray(['Product Name', 'Order Amount', 'Created By']);
        $writer->addRow($header);

        $this->db->select('order_tbl.*, product.product_name, product.product_price, users.name as name, users.email, users.phone');
        $this->db->from('order_tbl');
        $this->db->join('product', 'product.id = order_tbl.product_id', 'left');
        $this->db->join('users', 'users.id = order_tbl.user_id', 'left');

        $query = $this->db->get();
        $data = $query->result();


        foreach ($data as $row) {
            $writer->addRow(
                WriterEntityFactory::createRowFromArray([
                    $row->product_name,
                    $row->order_amount,
                    $row->name
                ])
            );
        }

        $writer->close();
    }
}
