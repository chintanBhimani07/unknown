<?php
$projectId = $_GET['projectId'];
$qry = $con->query("SELECT * FROM  projects WHERE project_id='$projectId';");
while ($row = $qry->fetch_assoc()) { ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Project Update</h1>
            <a href="./index.php?page=project-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Projects</a>
        </div>
        <div class="row add-employee-form scroll-component">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit_project_form">
                            <input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $row['project_id'] ?>">
                            <div class="form-group">
                                <label for="project_name" class="col-form-label mr-1">Project Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $row['project_name'] ?>" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="project_status" class="col-form-label mr-1">Project Status</label><span class="text-danger">*</span>
                                    <select class="form-control custom-select" id="project_status" name="project_status" value="<?php echo $row['project_status'] ?>">
                                        <option value="">Select status</option>
                                        <option value="Hold" <?php echo ($row['project_status'] == 'Hold' ? "selected" : "") ?>>Hold</option>
                                        <option value="Running" <?php echo ($row['project_status'] == 'Running' ? "selected" : "") ?>>Running</option>
                                        <option value="Pending" <?php echo ($row['project_status'] == 'Pending' ? "selected" : "") ?>>Pending</option>
                                        <option value="Complete" <?php echo ($row['project_status'] == 'Complete' ? "selected" : "") ?>>Complete</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="project_code" class="col-form-label mr-1">Project Code</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="project_code" name="project_code" value="<?php echo $row['project_code'] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="client_id" class="col-form-label mr-1">Client</label><span class="text-danger">*</span>
                                    <select class="form-control custom-select" id="client_id" name="client_id">
                                        <option value="">Select Client</option>
                                        <?php
                                        $qry = $con->query("SELECT client_id,client_first_name,client_last_name FROM clients;");
                                        while ($r = $qry->fetch_assoc()) { ?>
                                            <option value="<?php echo $r['client_id'] ?>" <?php echo ($row['client_id'] == $r['client_id'] ? "selected" : "") ?>><?php echo $r['client_first_name'] . " " . $r['client_last_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="start_date" class="col-form-label mr-1">Start Date</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php
                                                                                                                        if ($row['start_date'] != "0000-00-00") {
                                                                                                                            echo $row['start_date'];
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="expected_end_date" class="col-form-label mr-1">Expected End Date</label>
                                    <input type="date" class="form-control" id="expected_end_date" name="expected_end_date" value="<?php
                                                                                                                                    if ($row['expected_end_date'] != "0000-00-00") {
                                                                                                                                        echo $row['expected_end_date'];
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hod_id" class="col-form-label mr-1">Head Of Department</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="hod_id" name="hod_id">
                                    <option value="">Select HOD</option>
                                    <?php
                                    $qry = $con->query("SELECT hod_id,hod_first_name,hod_last_name FROM hod ORDER BY hod_first_name ASC;");
                                    while ($r = $qry->fetch_assoc()) { ?>
                                        <option value="<?php echo $r['hod_id'] ?>" <?php echo ($row['hod_id'] == $r['hod_id'] ? "selected" : "") ?>><?php echo $r['hod_first_name'] . " " . $r['hod_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nature_of_project" class="col-form-label mr-1">Nature Of Project</label><span class="text-danger">*</span>
                                <select class="form-control custom-select" id="nature_of_project" name="nature_of_project">
                                    <option value="">Select type</option>
                                    <option value="Project" <?php echo ($row['nature_of_project'] == 'Project' ? "selected" : "") ?>>Project</option>
                                    <option value="Bungalow" <?php echo ($row['nature_of_project'] == 'Bungalow' ? "selected" : "") ?>>Bungalow</option>
                                    <option value="Office" <?php echo ($row['nature_of_project'] == 'Office' ? "selected" : "") ?>>Office</option>
                                    <option value="Flat" <?php echo ($row['nature_of_project'] == 'Flat' ? "selected" : "") ?>>Flat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reference_by" class="col-form-label mr-1">Reference From</label>
                                <input type="text" class="form-control" id="reference_by" name="reference_by" value="<?php echo $row['reference_by'] ?>" autocomplete="off">
                            </div>
                            <div class="form-group ">
                                <label for="project_location" class="col-form-label mr-1">Project Location</label><span class="text-danger">*</span>
                                <textarea type="text" class="form-control" id="project_location" name="project_location" autocomplete="off"><?php echo $row['project_location'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="users_id" class="col-form-label mr-1">Users</label>
                                <select class="form-control custom-select" id="users_id" multiple name="users_id[]">
                                    <option value="">Select Users</option>
                                    <?php
                                    $qry = $con->query("SELECT emp_id,user_id,user_first_name,user_last_name FROM users WHERE user_access_type=2 ORDER BY user_first_name ASC ;");
                                    while ($r = $qry->fetch_assoc()) {
                                        $designation = '';
                                        $empId = $r['emp_id'];
                                        $empDesQry = $con->query("SELECT emp_designation FROM employees WHERE emp_id='$empId'");
                                        while ($e = $empDesQry->fetch_assoc()) {
                                            $designation = $e['emp_designation'];
                                        }
                                    ?>
                                        <option value="<?php echo $r['user_id'] ?>" <?php echo (in_array($r['user_id'], explode(',', $row['users_id'])) ? "selected" : "") ?>><?php echo $r['user_first_name'] . " " . $r['user_last_name'] . " - " . $designation ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="./index.php?page=project-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Project List</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>