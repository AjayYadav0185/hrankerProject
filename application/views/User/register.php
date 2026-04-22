<!DOCTYPE html>
<html>

<head>
    <title>Project Order</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="mb-4">Project Management</h3>


        <div id="msg"></div>

        <div class="card">
            <div class="card-body">

                <h2>Login</h2>

                <?php if (!empty($error)) echo $error; ?>

                <form method="post" action="<?php echo base_url('User/register'); ?>">

                    <div class="col">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                    </br>

                    <div class="col">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                    </div>
                    </br>

                    <div class="col">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    </br>

                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    </br>

                    <div class="col">
                        <label for="role_type">Register Type</label>
                        <select name="role_type" id="role_type" class="form-select" aria-label="Default select example">
                            <option selected value="admin">Admin</option>
                            <option value="employee">Employee</option>
                        </select>
                    </div>
                    </br>

                    <div class="col">
                        <button class="btn btn-primary" id="submitBtn">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</body>

</html>