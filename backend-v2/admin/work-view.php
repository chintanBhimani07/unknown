<?php
$i = 1;
$taskId =  $_GET['taskId'];
$qry = $con->query("SELECT * FROM  task WHERE task_id='$taskId'");
while ($row = $qry->fetch_assoc()) { ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php echo $row['task_name']; ?>
            </h1>
            <a href="./index.php?page=work-collector" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>All Works</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Task Information</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card  py-3 border-left-dark">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Task Name:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo ucwords($row['task_name']) ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Project Name:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php
                                                        $projectId = $row['project_id'];
                                                        $projectName = $con->query("SELECT project_name FROM projects WHERE project_id='$projectId'");
                                                        while ($p = $projectName->fetch_assoc()) {
                                                            echo $p['project_name'];
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Task Description:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php echo $row['task_description'] ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Task Assign From:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php
                                                        $taskEmpId = $row['task_assign_from'];
                                                        $taskEmp = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$taskEmpId';");
                                                        while ($u = $taskEmp->fetch_assoc()) {
                                                            echo $u['user_first_name'] . " " . $u['user_last_name'];
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Task Assign To:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php
                                                        $taskEmpId = $row['task_assign_to'];
                                                        $taskEmp = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$taskEmpId';");
                                                        while ($u = $taskEmp->fetch_assoc()) {
                                                            echo $u['user_first_name'] . " " . $u['user_last_name'];
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-3 my-2">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-500">Task Status:</span>
                                                </div>
                                                <div class="col-lg-9 my-2">
                                                    <span class="font-weight-bold">
                                                        <?php
                                                        if ($row['task_status'] == 2) { ?>
                                                            <span style="color: green">Complete</span>
                                                        <?php } else if ($row['task_status'] == 1) { ?>
                                                            <span style="color: blue">In Progress</span>
                                                        <?php } else { ?>
                                                            <span style="color: red">Not Started</span>
                                                        <?php } ?>
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

            <div class="col-lg-12">
                <div class="card-xl-12 shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Members Progress/Activity</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        $productivityData = $con->query("SELECT * FROM productivity WHERE task_id='$taskId';");
                        while ($p = $productivityData->fetch_assoc()) { ?>
                            <div class="d-flex flex-row comment-row ">
                                <?php
                                $userEmail = $_SESSION['login_user_email'];
                                $qry = $con->query("SELECT emp_profile_pic FROM employees WHERE emp_email='$userEmail'");
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <div class="p-2">
                                        <img class="img-profile rounded-circle" src="./assets/uploads/<?php echo $row['emp_profile_pic']; ?>">
                                    </div>
                                <?php } ?>
                                <div class="comment-text active w-100 m-2 ">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <?php
                                            $taskId = $p['task_id'];
                                            $findTask = $con->query("SELECT task_name FROM task WHERE task_id='$taskId'");
                                            while ($ft = $findTask->fetch_assoc()) { ?>
                                                <h6 class="h6 mb-1 text-gray-900"><?php echo ($_SESSION['login_user_first_name'] . " " . $_SESSION['login_user_last_name'] . " [" . $ft['task_name'] . "] "); ?></h6>
                                            <?php }
                                            ?>
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