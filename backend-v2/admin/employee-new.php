<?php
$l_emp_id = "";
$lastInsert = $con->query("SELECT emp_code FROM employees ORDER BY emp_code DESC LIMIT 1;");
while ($l = $lastInsert->fetch_assoc()) {
    $l_emp_id = $l['emp_code'] + 1;
} ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between" style="margin-bottom:0.5rem">
        <div>
            <h1 class="h3 mb-0 text-gray-800">New Employee</h1>
            <span class="h6">Employee Code: <?php echo $l_emp_id ?></span>
        </div>
        <a href="./index.php?page=employee-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Employee</a>
    </div>
    <div class="row add-employee-form scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body" id="form_body">
                    <form id="new_employee_form" name="employeeForm">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="emp_code" name="emp_code" value="<?php echo $l_emp_id; ?>" autocomplete="off">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_first_name" class="col-form-label mr-1">First Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="emp_first_name" name="emp_first_name" autocomplete="off" autofocus>
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_last_name" class="col-form-label mr-1">Last Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="emp_last_name" name="emp_last_name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="emp_gender" class="col-form-label mr-1">Gender</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_gender" name="emp_gender">
                                    <option value="" selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="emp_dob" class="col-form-label mr-1">Date Of Birth</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="emp_dob" name="emp_dob">
                            </div>
                            <div class="col-sm-4">
                                <label for="emp_mob" class="col-form-label mr-1">Mobile No.</label><span class="text-danger">*</span>
                                <input type="tel" class="form-control" id="emp_mob" name="emp_mob" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp_description" class="col-form-label mr-1">Description</label>
                            <textarea type="text" class="form-control" id="emp_description" name="emp_description" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp_email" class="col-form-label mr-1">Email Address</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" id="emp_email" name="emp_email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="emp_address" class="col-form-label mr-1">Resident Address</label>
                            <textarea type="text" class="form-control" id="emp_address" name="emp_address" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="emp_department" class="col-form-label mr-1">Department</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_department" name="emp_department">
                                    <option value="" selected>Select Department</option>
                                    <option value="Admin">Admin</option>
                                    <option value="IT">IT</option>
                                    <option value="MDO">MDO</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Finance">Finance</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="emp_designation" class="col-form-label mr-1">Designation</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="emp_designation" name="emp_designation">
                                    <option value="" selected>Select Designation</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="HOD">HOD</option>
                                    <option value="Junior Developer">Junior Developer</option>
                                    <option value="Junior Interior">Junior Interior</option>
                                    <option value="Junior Architecture">Junior Architecture</option>
                                    <option value="Senior Developer">Senior Developer</option>
                                    <option value="Senior Architecture">Senior Architecture</option>
                                    <option value="Senior Interior">Senior Interior</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Intern">Intern</option>
                                    <option value="MDO Staff">MDO Staff</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_joining_date" class="col-form-label mr-1">Joining Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="emp_joining_date" name="emp_joining_date" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_confirmation_date" class="col-form-label mr-1">Confirmation Date</label>
                                <input type="date" class="form-control" id="emp_confirmation_date" name="emp_confirmation_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="emp_leaving_date" class="col-form-label mr-1">Leaving Date</label>
                                <input type="date" class="form-control" id="emp_leaving_date" name="emp_leaving_date" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="emp_working_hours" class="col-form-label mr-1">Working Hours</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" id="emp_working_hours" name="emp_working_hours" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp_profile_pic" class="col-form-label mr-1">Profile Picture</label>
                            <input type="file" class="custom-file" id="emp_profile_pic" name="emp_profile_pic" autocomplete="off" onchange="preview()">
                            <img id="thumb" src="" width="100px" />
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-1">
                                <button class="btn btn-primary btn-user btn-block" id="submitForm">Submit Details</button>
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
