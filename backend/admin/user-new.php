
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New User</h1>
        <a href="./index.php?page=user-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Users</a>
    </div>
    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_user_form">
                        <div class="form-group ">
                            <label for="user_email" class="col-form-label mr-1">Employee Name</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="user_email" name="user_email" autofocus>
                                <option value="" selected>Select Name</option>
                                <?php
                                $qry = $con->query("SELECT emp_email,emp_first_name,emp_last_name FROM employees ORDER BY emp_first_name ASC;");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['emp_email'] ?>"><?php echo $row['emp_first_name'] . " " . $row['emp_last_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group position-relative">
                            <label for="user_password" class="col-form-label mr-1">Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="user_password" name="user_password" autocomplete="off">
                            <i type="button" class="fa-solid fa-eye position-absolute" id="showPassword" style="top:50px;right:10px"></i>
                            <i type="button" class="fa-solid fa-eye-slash position-absolute" id="hidePassword" style="top:50px;right:10px"></i>
                        </div>
                        <div class="form-group">
                            <label for="user_confirm_password" class="col-form-label mr-1">Confirm Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="user_confirm_password" name="user_confirm_password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="user_access_type" class="col-form-label mr-1">Access Type</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="user_access_type" name="user_access_type">
                                <option value="" selected>Select Access Type</option>
                                <option value="2">Employee</option>
                                <option value="1">Admin</option>
                                <option value="3">Engineer</option>
                                <option value="4">HOD</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=user-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to User List</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#hidePassword').hide();
        $('#showPassword').hide();

        $('#showPassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $("#showPassword").hide();
                $('#hidePassword').show();
            }
        });
        $('#hidePassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'text') {
                passwordField.attr('type', 'password');
                $("#hidePassword").hide();
                $('#showPassword').show();
            }
        });

        $('#user_password').on('input', function() {
            if ($(this).val().length > 0) {
                $("#showPassword").show();

            } else {
                $("#showPassword").hide();
                $("#hidePassword").hide();
            }
        });
    });
</script>