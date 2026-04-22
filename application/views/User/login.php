<!DOCTYPE html>
<html>

<head>
    <title>Project Order</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Login</h2>



        <div id="msg"></div>

        <div class="card">
            <div class="card-body">


                <?php if (!empty($error)) echo $error; ?>

                <form method="post" action="<?php echo base_url('User/login'); ?>">

                    <div class="col">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    </br>

                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    </br>

                    <div class="col">
                        <label for="role_type">Login Type</label>
                        <select name="role_type" id="role_type" class="form-select" aria-label="Default select example">
                            <option selected value="admin">Admin</option>
                            <option value="employee">Employee</option>
                        </select>
                    </div>
                    </br>

                    <div class="col">
                        <button class="btn btn-primary" id="submitBtn">Login</button>
                    </div>
                    <a href="<?php echo base_url('User/register'); ?>" class="btn btn-danger btn-sm mt-3">
                        Register
                    </a>


                </form>
            </div>
        </div>
    </div>



</body>

</html>