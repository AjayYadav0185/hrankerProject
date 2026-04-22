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
    <h3 class="mb-4">
      <?= strtoupper($this->session->userdata('role_type')) . ' ' . $this->session->userdata('user_name') ?> Login
    </h3>

    <a href="<?= base_url('User/logout') ?>" class="btn btn-danger btn-sm">Logout</a>

    <h3 class="mb-4">Project Management</h3>
    <?php if (!empty($error)) echo $error; ?>

    <div id="msg"></div>

    <div class="card">
      <div class="card-body">

        <form id="orderForm" method="post" action="<?= base_url('orders/store'); ?>">

          <label for="product_select">Product</label>

          <select name="product_select" id="product_select" class="form-select">
            <option value="">-- Select Product --</option>

            <?php foreach ($products as $product) { ?>
              <option value="<?= $product->id ?>">
                <?= $product->product_name . " (" . $product->product_name . ")" ?>
              </option>
            <?php } ?>
          </select>

          <div class="col mt-2">
            <button class="btn btn-primary" id="submitBtn">Add</button>
          </div>

        </form>

        <?php if ($this->session->userdata('role_type') != 'employee'): ?>

          <a href="<?= base_url('orders/export_large') ?>" class="btn btn-danger btn-sm mt-2">
            Export All
          </a>


          <table class="table table-bordered mt-3" id="orderTable">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Order Amount</th>
                <th>Created_By</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        <?php endif; ?>

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

      let isEmployee = "<?= $this->session->userdata('role_type') ?>" === "employee";

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
        dom: isEmployee ? 'lfrtip' : 'Blfrtip',
        lengthMenu: [
          [5, 10, 25, 50, 100],
          [5, 10, 25, 50, 100]
        ],
        buttons: isEmployee ? [] : [{
          extend: 'excel',
          className: 'btn btn-success'
        }]
      });

    });
  </script>
</body>

</html>