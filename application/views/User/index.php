<!DOCTYPE html>
<html>

<head>
  <title>Project Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <div class="container mt-4">
    <h3 class="mb-4">Admin <?= $this->session->userdata('user_name') ?> Login</h3> <a href="<?= base_url('User/logout') ?>" class="btn btn-danger btn-sm">Logout</a>

    <h3 class="mb-4">Project Management</h3>
    <div id="msg"></div>
    <div class="card">
      <div class="card-body">

        <form id="orderForm" method="post" action="<?php echo base_url('orders/store'); ?>">

          <label for="product_select">Product Id</label>
          <select name="product_select" id="product_select" class="form-select" aria-label="Default select example">
            <option value="1">Mobile</option>
            <option value="2">Telephone</option>
          </select>

          <div class="col">
            <button class="btn btn-primary" id="submitBtn">Add</button>
          </div>

        </form>

        <a href="<?= base_url('orders/export_large') ?>" class="btn btn-danger btn-sm">Export All</a>



        <table class="table table-bordered" id="orderTable">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Order Amount</th>
              <th>Created_By</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>


      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script>
    let table;

    $(document).ready(function() {

      table = $('#orderTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?= base_url('orders/get_orders') ?>",
          type: "POST"
        },
        columns: [{
            data: 'product_name'
          },
          {
            data: 'order_amount'
          },
          {
            data: 'name'
          }
        ],
        dom: 'Blfrtip',
        lengthMenu: [
          [5, 10, 25, 50, 100],
          [5, 10, 25, 50, 100]
        ],
        buttons: [{
          extend: 'excel',
          className: 'btn btn-success'
        }]
      });

    });
  </script>
</body>

</html>