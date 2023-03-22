<style>
    .error {
        color: #ff0000 !important;
        position: relative !important;
        line-height: 1 !important;
        font-size: 1rem !important;
        width: 100% !important;
    }

    .form-control.error {
        border: 1px solid #ff0000;
        color: #5a5c69 !important;
    }
</style>

<?php
$empId = $_GET['empId'];
$qry = $con->query("SELECT * FROM  employees WHERE emp_id='$empId';");
while ($row = $qry->fetch_assoc()) { ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Employee Update</h1>
                <span class="h6">Employee Code: <?php echo $row['emp_code'] ?></span>
            </div>
            <a href="./index.php?page=employee-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Employee</a>
        </div>
        <div class="row add-employee-form">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit_employee_form">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="emp_code" name="emp_code" value="<?php echo $row['emp_code'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <input type="hidden" class="form-control" id="emp_id" name="emp_id" value="<?php echo $row['emp_id'] ?>" autocomplete="off">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="emp_first_name" class="col-form-label mr-1">First Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="emp_first_name" name="emp_first_name" value="<?php echo $row['emp_first_name'] ?>" autocomplete="off" autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <label for="emp_last_name" class="col-form-label mr-1">Last Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="emp_last_name" name="emp_last_name" value="<?php echo $row['emp_last_name'] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="emp_gender" class="col-form-label mr-1">Gender</label><span class="text-danger">*</span>
                                    <select class="form-control custom-select" id="emp_gender" name="emp_gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" <?php echo ($row['emp_gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                        <option value="Female" <?php echo ($row['emp_gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                        <option value="Other" <?php echo ($row['emp_gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="emp_dob" class="col-form-label mr-1">Date Of Birth</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" id="emp_dob" name="emp_dob" value="<?php echo $row['emp_dob'] ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="emp_mob" class="col-form-label mr-1">Mobile No.</label><span class="text-danger">*</span>
                                    <input type="tel" class="form-control" id="emp_mob" name="emp_mob" autocomplete="off" value="<?php echo $row['emp_mob'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_description" class="col-form-label mr-1">Description</label>
                                <textarea type="text" class="form-control" id="emp_description" name="emp_description" autocomplete="off"><?php echo $row['emp_description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="emp_email" class="col-form-label mr-1">Email Address</label><span class="text-danger">*</span>
                                <input type="email" class="form-control" id="emp_email" name="emp_email" autocomplete="off" value="<?php echo $row['emp_email'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="emp_address" class="col-form-label mr-1">Resident Address</label>
                                <textarea type="text" class="form-control" id="emp_address" name="emp_address" autocomplete="off"><?php echo $row['emp_address'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="emp_department" class="col-form-label mr-1">Department</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_department" name="emp_department" required>
                                    <option value="">Select Department</option>
                                    <option value="Admin" <?php echo ($row['emp_department'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="IT" <?php echo ($row['emp_department'] == 'IT') ? 'selected' : '' ?>>IT</option>
                                    <option value="MDO" <?php echo ($row['emp_department'] == 'MDO') ? 'selected' : '' ?>>MDO</option>
                                    <option value="Architecture" <?php echo ($row['emp_department'] == 'Architecture') ? 'selected' : '' ?>>Architecture</option>
                                    <option value="Engineer" <?php echo ($row['emp_department'] == 'Engineer') ? 'selected' : '' ?>>Engineer</option>
                                    <option value="Interior" <?php echo ($row['emp_department'] == 'Interior') ? 'selected' : '' ?>>Interior</option>
                                    <option value="Finance" <?php echo ($row['emp_department'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emp_designation" class="col-form-label mr-1">Designation</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_designation" name="emp_designation" required>
                                    <option value="">Select Designation</option>
                                    <option value="Administrator" <?php echo ($row['emp_designation'] == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
                                    <option value="HOD" <?php echo ($row['emp_designation'] == 'HOD') ? 'selected' : '' ?>>HOD</option>
                                    <option value="Junior Developer" <?php echo ($row['emp_designation'] == 'Junior Developer') ? 'selected' : '' ?>>Junior Developer</option>
                                    <option value="Junior Architecture" <?php echo ($row['emp_designation'] == 'Junior Architecture') ? 'selected' : '' ?>>Junior Architecture</option>
                                    <option value="Junior Interior" <?php echo ($row['emp_designation'] == 'Junior Interior') ? 'selected' : '' ?>>Junior Interior</option>
                                    <option value="Senior Developer" <?php echo ($row['emp_designation'] == 'Senior Developer') ? 'selected' : '' ?>>Senior Developer</option>
                                    <option value="Senior Architecture" <?php echo ($row['emp_designation'] == 'Senior Architecture') ? 'selected' : '' ?>>Senior Architecture</option>
                                    <option value="Senior Interior" <?php echo ($row['emp_designation'] == 'Senior Interior') ? 'selected' : '' ?>>Senior Interior</option>
                                    <option value="Engineer" <?php echo ($row['emp_designation'] == 'Engineer') ? 'selected' : '' ?>>Engineer</option>
                                    <option value="Driver" <?php echo ($row['emp_designation'] == 'Driver') ? 'selected' : '' ?>>Driver</option>
                                    <option value="Staff" <?php echo ($row['emp_designation'] == 'Staff') ? 'selected' : '' ?>>Staff</option>
                                    <option value="Intern" <?php echo ($row['emp_designation'] == 'Intern') ? 'selected' : '' ?>>Intern</option>
                                    <option value="MDO Staff" <?php echo ($row['emp_designation'] == 'MDO Staff') ? 'selected' : '' ?>>MDO Staff</option>
                                    <option value="Other" <?php echo ($row['emp_designation'] == 'Other') ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="emp_joining_date" class="col-form-label mr-1">Joining Date</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" id="emp_joining_date" name="emp_joining_date" autocomplete="off" value="<?php echo $row['emp_joining_date'] ?>">

                                </div>
                                <div class="col-sm-6">
                                    <label for="emp_confirmation_date" class="col-form-label mr-1">Confirmation Date</label>
                                    <input type="date" class="form-control" id="emp_confirmation_date" name="emp_confirmation_date" autocomplete="off" value="<?php
                                                                                                                                                                if ($row['emp_confirmation_date'] != "0000-00-00") {
                                                                                                                                                                    echo $row['emp_confirmation_date'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo "";
                                                                                                                                                                } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="emp_leaving_date" class="col-form-label mr-1">Leaving Date</label>
                                    <input type="date" class="form-control" id="emp_leaving_date" name="emp_leaving_date" autocomplete="off" value="<?php
                                                                                                                                                    if ($row['emp_leaving_date'] != "0000-00-00") {
                                                                                                                                                        echo $row['emp_leaving_date'];
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="emp_working_hours" class="col-form-label mr-1">Working Hours</label><span class="text-danger">*</span>
                                    <input type="time" class="form-control" id="emp_working_hours" name="emp_working_hours" autocomplete="off" value="<?php echo $row['emp_working_hours'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_profile_pic" class="col-form-label mr-1">Profile Picture</label>
                                <input type="file" class="custom-file" id="emp_profile_pic" name="emp_profile_pic" autocomplete="off" onchange="preview()">
                                <input type="hidden" class="custom-file" id="oldFile" name="oldFile" autocomplete="off" value="<?php echo $row['emp_profile_pic'] ?>">
                                <img id="thumb" src="./assets/uploads/<?php echo $row['emp_profile_pic'] ?>" width="100px" />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="./index.php?page=employee-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Employees List</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    function preview() {
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }

    function uploadImg() {
        if ($('#emp_profile_pic').val()) {
            let img = $('#emp_profile_pic').prop('files')[0];
            let empCode = $('#emp_code').val();
            var formData = new FormData();
            formData.append('emp_profile_pic', img);
            formData.append('emp_code', empCode);
            $.ajax({
                type: "POST",
                url: "./php/actions.php?action=upload_emp_profile",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 200) {
                        $('#edit_employee_form').append(
                            `<div class="alert alert-success  showMessage" role="alert" id="errorMsg">
                                <span>${response.message}</span>
                            </div>`
                        );
                    } else {
                        $('#edit_employee_form').append(
                            `<div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                <span>${response.message}</span>
                            </div>`
                        );
                        setTimeout(() => {
                            $('.showMessage').hide();
                        }, 3000)
                    }
                },
                error: function(response) {
                    response = JSON.parse(response);
                    $('#edit_employee_form').append(
                        `<div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                <span>${response.message}</span>
                            </div>`
                    );
                    setTimeout(() => {
                        $('.showMessage').hide();
                    }, 3000)
                }
            });
        } else {}
    }

    $(document).ready(function() {

        $("#edit_employee_form").validate({
            // Define validation rules
            rules: {
                emp_code: "required",
                emp_first_name: "required",
                emp_last_name: "required",
                emp_gender: "required",
                emp_dob: "required",
                emp_mob: "required",
                emp_email: "required",
                emp_department: "required",
                emp_designation: "required",
                emp_joining_date: "required",
                emp_working_hours: "required",
                emp_code: {
                    required: true
                },
                emp_first_name: {
                    required: true
                },
                emp_last_name: {
                    required: true
                },
                emp_gender: {
                    required: true
                },
                emp_dob: {
                    required: true
                },
                emp_mob: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                emp_email: {
                    required: true,
                    email: true
                },
                emp_department: {
                    required: true
                },
                emp_designation: {
                    required: true,
                },
                emp_joining_date: {
                    required: true,
                },
                emp_working_hours: {
                    required: true
                },
            },
            // Specify validation error messages
            messages: {
                emp_code: "Please provide a valid Code",
                emp_first_name: "Please provide a valid first name",
                emp_last_name: "Please provide a valid last name",
                emp_gender: "Please select a valid gender",
                emp_dob: "Please select a valid date",
                emp_mob: {
                    required: "Please provide a phone number",
                    minlength: "Phone number must be min 10 characters long",
                    maxlength: "Phone number must not be more than 10 characters long"
                },
                emp_email: {
                    required: "Please enter your email",
                    minlength: "Please enter a valid email address"
                },
                emp_department: "Please select a valid department",
                emp_designation: "Please select a valid designation",
                emp_joining_date: "Please select a valid date",
                emp_working_hours: "Please select a valid time",
            },
            submitHandler: function(form) {
                $.ajax({
                    url: './php/actions.php?action=edit_employee',
                    data: $("#edit_employee_form").serialize(),
                    type: 'POST',
                    success: function(res) {
                        uploadImg();
                        res = JSON.parse(res);
                        if (res.status == 200) {
                            $('#edit_employee_form').append(
                                `<div class="alert alert-success  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>`
                            );
                            setTimeout(() => {
                                window.location = './index.php?page=employee-dashboard';
                            }, 4000);
                        } else {
                            $('#edit_employee_form').append(
                                `<div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>`
                            );
                            setTimeout(() => {
                                $('.showMessage').hide();
                            }, 4000);
                        }
                    }
                });
            }
        });
    });
</script>