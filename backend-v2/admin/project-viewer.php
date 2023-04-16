<?php
$i = 1;
$id =  $_GET['projectId'];
$qry = $con->query("SELECT * FROM  projects WHERE project_id ='$id'");
while ($row = $qry->fetch_assoc()) { ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php echo $row['project_name']; ?>
            </h1>
            <a href="./index.php?page=project-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Projects</a>
        </div>
        <div class='scroll-component'>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Project Information</h6>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 mb-4">
                                                <div class="card border-left-dark h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text font-weight-bold text-dark text-uppercase mb-1" style="font-size:1.2rem;">
                                                                    Project Employees</div>
                                                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                                    <ol>
                                                                        <?php
                                                                        $data = $con->query("SELECT users_id FROM projects WHERE project_id='$id';");
                                                                        while ($r = $data->fetch_assoc()) {
                                                                            $arr = explode(",", $r['users_id']);
                                                                            foreach ($arr as $v) {
                                                                                if ($v != '') { ?>
                                                                                    <li class="my-3">
                                                                                    <?php
                                                                                    $userName = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$v';");
                                                                                    while ($u = $userName->fetch_assoc()) {
                                                                                        echo $u['user_first_name'] . " " . $u['user_last_name'];
                                                                                    }
                                                                                }  ?></li>
                                                                            <?php
                                                                            }
                                                                        } ?>
                                                                    </ol>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="card  py-3 border-left-dark">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project Name:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo ucwords($row['project_name']) ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project Status:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php
                                                            if ($row['project_status'] == 2) { ?>
                                                                <span style="color: green">Complete</span>
                                                            <?php } else if ($row['project_status'] == 1) { ?>
                                                                <span style="color: blue">Running</span>
                                                            <?php } else { ?>
                                                                <span style="color: red">Hold</span>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project Code:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo $row['project_code'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Client:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php
                                                            $clientId = $row['client_id'];
                                                            $clientData = $con->query("SELECT client_first_name,client_last_name FROM clients WHERE client_id='$clientId';");
                                                            while ($c = $clientData->fetch_assoc()) {
                                                                echo ucwords($c['client_first_name']) . " " . ucwords($c['client_last_name']);
                                                            } ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project Start Date:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo date("d-m-Y", strtotime($row['start_date'])); ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project End Date:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo date("d-m-Y", strtotime($row['expected_end_date'])); ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">HOD:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php
                                                            $hodId = $row['hod_id'];
                                                            $hodData = $con->query("SELECT hod_first_name,hod_last_name FROM hod WHERE hod_id='$hodId';");
                                                            while ($h = $hodData->fetch_assoc()) {
                                                                echo ucwords($h['hod_first_name']) . " " . ucwords($h['hod_last_name']);
                                                            } ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Nature Of Project:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo ucwords($row['nature_of_project']) ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Reference By:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo ucwords($row['reference_by']) ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3 my-2">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Project Location:</span>
                                                    </div>
                                                    <div class="col-lg-9 my-2">
                                                        <span class="font-weight-bold">
                                                            <?php echo ucwords($row['project_location']) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 p-0">
                <div class="card-xl-12 shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?php echo $row['project_name'] . "'s Task List"; ?>
                        </h6>
                        <?php
                        if ($_SESSION['login_user_access_type'] == 4) { ?>
                            <a href="./index.php?page=task-new&projectId=<?php echo $id; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Task</a>
                        <?php } ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">Sr No.</th>
                                        <th width="20%">Task Name</th>
                                        <th width="35%">Task Description</th>
                                        <th width="25%">Task Assign From</th>
                                        <th width="25%">Task Assign To</th>
                                        <th width="20%">Task Status</th>
                                        <?php
                                        if ($_SESSION['login_user_access_type'] == 4) { ?>
                                            <th width="5%">Actions</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $qry = $con->query("SELECT * FROM task WHERE project_id='$id';");
                                    while ($row = $qry->fetch_assoc()) { ?>
                                        <tr>
                                            <td scope="row">
                                                <?php echo $i++ ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['task_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['task_description'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $assignFromId = $row['task_assign_from'];
                                                $hodQry = $con->query("SELECT hod_first_name,hod_last_name FROM hod WHERE hod_id='$assignFromId'");
                                                while ($h = $hodQry->fetch_assoc()) {
                                                    echo $h['hod_first_name'] . ' ' . $h['hod_last_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $taskEmpId = $row['task_assign_to'];
                                                $taskEmp = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$taskEmpId';");
                                                while ($u = $taskEmp->fetch_assoc()) {
                                                    echo $u['user_first_name'] . " " . $u['user_last_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['task_status'] == 2) { ?>
                                                    <span style="color: green">Complete</span>
                                                <?php } else if ($row['task_status'] == 1) { ?>
                                                    <span style="color: blue">In Progress</span>
                                                <?php } else { ?>
                                                    <span style="color: red">Not Started</span>
                                                <?php } ?>
                                            </td>
                                            <?php
                                            if ($_SESSION['login_user_access_type'] == 4) { ?>
                                                <td class="d-flex align-items-center justify-content-center">
                                                    <div class="dropdown no-arrow">
                                                        <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                            <a type="button" class="dropdown-item" href="./index.php?page=productivity-new&taskId=<?php echo $row['task_id'] ?>&projectId=<?php echo $id ?>">Add Productivity</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a type="button" class="dropdown-item" href="./index.php?page=task-edit&taskId=<?php echo $row['task_id'] ?>&projectId=<?php echo $id ?>">Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a type="button" class="dropdown-item" id="deleteTask" href="#" data-id="<?php echo $row['task_id'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-0">
                <div class="card-xl-12 shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Members Progress/Activity</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        $productivityData = $con->query("SELECT * FROM productivity WHERE project_id='$id';");
                        while ($p = $productivityData->fetch_assoc()) { ?>
                            <div class="d-flex flex-row comment-row ">
                                <?php
                                $userId = $p['user_id'];
                                $qry = $con->query("SELECT emp_id FROM users WHERE user_id='$userId'");
                                while ($u = $qry->fetch_assoc()) {
                                    $empId = $u['emp_id'];
                                    $empQuery = $con->query("SELECT * FROM employees WHERE emp_id='$empId'");
                                    while ($e = $empQuery->fetch_assoc()) { ?>
                                        <div class="p-2">
                                            <img class="img-profile rounded-circle" src="./assets/uploads/<?php echo $e['emp_profile_pic']; ?>">
                                        </div>
                                        <div class="comment-text active w-100 m-2 ">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <?php
                                                    $taskId = $p['task_id'];
                                                    $findTask = $con->query("SELECT task_name FROM task WHERE task_id='$taskId'");
                                                    while ($ft = $findTask->fetch_assoc()) { ?>
                                                        <h6 class="h6 mb-1 text-gray-900"><?php echo ($e['emp_first_name'] . " " . $e['emp_last_name'] . " [" . $ft['task_name'] . "] "); ?></h6>
                                                <?php }
                                                }
                                                ?>
                                            <?php } ?>
                                                </div>
                                                <?php
                                                if ($_SESSION['login_user_access_type'] == 1 || $_SESSION['login_user_access_type'] == 4) { ?>
                                                    <div class="dropdown no-arrow">
                                                        <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="productDropdown">
                                                            <a type="button" class="dropdown-item" href="./index.php?page=productivity-edit&productivityId=<?php echo $p['productivity_id'] ?>">Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a type="button" class="dropdown-item" id="deleteProductivity" href="#" data-id="<?php echo $p['productivity_id'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="comment-footer d-flex align-items-center justify-content-between">
                                                <div>
                                                    <span class="mr-2" style="font-size:12px !important;"><b>Date: </b> <?php echo $p['productivity_date']; ?></span>
                                                </div>
                                                <div>
                                                    <span class="mr-2" style="font-size:12px !important;"><b>Start: </b> <?php echo date("h:i A", strtotime($p['start_time'])); ?></span>
                                                    <span style="font-size:12px !important;"><b>End: </b><?php echo date("h:i A", strtotime($p['end_time'])); ?></span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="mr-2" style="font-size:12px !important;"><b>Subject: </b> <?php echo $p['productivity_subject']; ?></span>
                                            </div>
                                            <p class="mt-2" style="font-size:14px !important;">
                                                <?php echo $p['productivity_comments'] ?>
                                            </p>
                                        </div>
                            </div>
                            <hr class="sidebar-divider">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<div class="modal" id="openModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; background:#3e64d3;color:#fff">
                <h5 class="modal-title" id="addStatusModalLabel">Remove Task Or Productivity</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove permanently?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal">No</button>
                <button type="button" class="btn btn-primary" id="submitModel">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let id = '';
        let deleteTask = false;
        let deleteProductivity = false;
        $('#openModal').hide();
        $(document).on('click', '#deleteTask', function(e) {
            e.preventDefault();
            deleteTask = true;
            deleteProductivity = false;
            id = $(this).data('id');
            $('#openModal').show();
        });
        $(document).on('click', '#deleteProductivity', function(e) {
            e.preventDefault();
            deleteProductivity = true;
            deleteTask = false;
            id = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            if (deleteTask && !deleteProductivity) {
                $.ajax({
                    url: './php/actions.php?action=delete_task',
                    method: 'POST',
                    data: {
                        task_id: id
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.status == 200) {
                            toastr.success(res.message);
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(res) {
                        res = JSON.parse(res);
                        toastr.error(res.message);
                    }
                });
            } else if (deleteProductivity && !deleteTask) {
                $.ajax({
                    url: './php/actions.php?action=delete_productivity',
                    method: 'POST',
                    data: {
                        productivity_id: id
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.status == 200) {
                            toastr.success(res.message);
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(res) {
                        res = JSON.parse(res);
                        toastr.error(res.message);
                    }
                });
            }
        });
    });
</script>