<?php
$projectId = $_GET['projectId'];
$hodId = '';
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-600">New Task For
            <?php
            $projectNameQry = $con->query("SELECT project_name,hod_id FROM projects WHERE project_id ='$projectId'");
            while ($p = $projectNameQry->fetch_assoc()) {
                $hodId = $p['hod_id'];
            ?> <span class="h3 text-gray-900">
                    <?php echo $p['project_name']; ?>
                </span>
            <?php
            }
            ?>
        </h1>
        <a href="./index.php?page=task-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>All Task</a>
    </div>
    <div class="row add-employee-form scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_task_form">
                        <input type="hidden" class="form-control" id="task_assign_from" name="task_assign_from" value="<?php echo $hodId; ?>" autocomplete="off">
                        <input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $projectId; ?>" autocomplete="off">
                        <div class="form-group ">
                            <label for="task_name" class="col-form-label mr-1">Task Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="task_name" name="task_name" autocomplete="off" autofocus >
                        </div>
                        <div class="form-group">
                            <label for="task_description" class="col-form-label mr-1">Task Description</label><span class="text-danger">*</span>
                            <textarea type="text" class="form-control" id="task_description" name="task_description" autocomplete="off" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="task_assign_to" class="col-form-label mr-1">Task Assign To</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="task_assign_to" name="task_assign_to" >
                                <option value="">Select Employee</option>
                                <option disabled style="font-weight:900;">Architecture & Interiors</option>
                                <?php
                                $data = $con->query("SELECT users_id FROM projects WHERE project_id='$projectId';");
                                while ($r = $data->fetch_assoc()) {
                                    $arr = explode(",", $r['users_id']);
                                    foreach ($arr as $v) { ?>
                                        <option value="<?php echo $v ?>">
                                            <?php
                                            $userName = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$v';");
                                            while ($u = $userName->fetch_assoc()) {
                                                echo $u['user_first_name'] . " " . $u['user_last_name'];
                                            }
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                                <option disabled style="font-weight:900;">Engineers</option>
                                <?php
                                $data = $con->query("SELECT engineers_id FROM projects WHERE project_id='$projectId';");
                                while ($r = $data->fetch_assoc()) {
                                    $arr = explode(",", $r['engineers_id']);
                                    foreach ($arr as $v) { ?>
                                        <option value="<?php echo $v ?>">
                                            <?php
                                            $userName = $con->query("SELECT user_first_name,user_last_name FROM users WHERE user_id='$v';");
                                            while ($u = $userName->fetch_assoc()) {
                                                echo $u['user_first_name'] . " " . $u['user_last_name'];
                                            }
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=project-viewer&projectId=<?php echo $projectId; ?>" class="btn btn-warning btn-user btn-block text-dark">Back to Project</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>