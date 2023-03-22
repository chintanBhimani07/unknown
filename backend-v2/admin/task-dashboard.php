<?php
$empId = $_SESSION['login_emp_id'];
$hodQry = $con->query("SELECT hod_id,hod_first_name,hod_last_name FROM hod WHERE emp_id='$empId'");
$hodId = '';
$hodName = '';
while ($h = $hodQry->fetch_assoc()) {
    $hodId = $h['hod_id'];
    $hodName = $h['hod_first_name'] . ' ' . $h['hod_last_name'];
}
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Works</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($_SESSION['login_user_access_type'] == 1) {
                                    echo $con->query("SELECT * FROM task;")->num_rows . ' ' . 'Work';
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    echo $con->query("SELECT * FROM task WHERE task_assign_from='$hodId';")->num_rows . ' ' . 'Work';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Running</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($_SESSION['login_user_access_type'] == 1) {
                                    echo $con->query("SELECT * FROM task WHERE task_status=1;")->num_rows . ' ' . 'Work';
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    echo $con->query("SELECT * FROM task WHERE task_assign_from='$hodId' AND task_status=1;")->num_rows . ' ' . 'Work';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php
                                if ($_SESSION['login_user_access_type'] == 1) {
                                    echo $con->query("SELECT * FROM task WHERE task_status=2;")->num_rows . ' ' . 'Work';
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    echo $con->query("SELECT * FROM task WHERE task_assign_from='$hodId' AND task_status=2;")->num_rows . ' ' . 'Work';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $con->query("SELECT * FROM task WHERE task_assign_from='$hodId' AND task_status=0;")->num_rows . ' ' . 'Work'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card-12 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Task Name</th>
                                    <th>Task Description</th>
                                    <th>Task Assign To</th>
                                    <th>Task Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($_SESSION['login_user_access_type'] == 1) {
                                    $qry = $con->query("SELECT * FROM task;");
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    $qry = $con->query("SELECT * FROM task WHERE task_assign_from='$hodId';");
                                }
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <td scope="row">
                                            <?php echo $i++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['task_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['task_description'] ?>
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
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>