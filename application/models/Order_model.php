<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    private $table = 'order_tbl';


    public function get_all()
    {
        return $this->db->select('order_tbl.*, product.product_name, product.product_price, users.name as user_name, users.email')
            ->from($this->table)
            ->join('product', 'product.id = order_tbl.product_id', 'left')
            ->join('users', 'users.id = order_tbl.user_id', 'left')
            ->order_by('order_tbl.id', 'DESC')
            ->get()
            ->result();
    }


    public function get($id)
    {
        return $this->db->select('order_tbl.*, product.product_name, product.product_price, users.name as user_name, users.email')
            ->from($this->table)
            ->join('product', 'product.id = order_tbl.product_id', 'left')
            ->join('users', 'users.id = order_tbl.user_id', 'left')
            ->where('order_tbl.id', $id)
            ->get()
            ->row();
    }


    public function insert($data)
    {

        if (!empty($data['product_id'])) {
            $product = $this->db->get_where('product', ['id' => $data['product_id']])->row();
            if ($product) {
                $data['order_amount'] = $product->product_price;
            }
        }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function update($id, $data)
    {

        if (!empty($data['product_id'])) {
            $product = $this->db->get_where('product', ['id' => $data['product_id']])->row();
            if ($product) {
                $data['order_amount'] = $product->product_price;
            }
        }

        return $this->db->where('id', $id)
            ->update($this->table, $data);
    }


    public function delete($id)
    {
        return $this->db->where('id', $id)
            ->delete($this->table);
    }


    public function get_product($id = null)
    {

        if ($id) {
            return $this->db->select('')->where('order_tbl.id', $id)
                ->get()
                ->row();
        } else {
            return $this->db->select('')->get()
                ->row();
        }
    }
}
