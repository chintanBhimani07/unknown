<?php
$userId = $_SESSION['login_user_id'];
$empId = $_SESSION['login_emp_id'];
$hodQry = $con->query("SELECT hod_id,hod_first_name,hod_last_name FROM hod WHERE emp_id='$empId'");
$hodId = '';
$hodName = '';
while ($h = $hodQry->fetch_assoc()) {
    $hodId = $h['hod_id'];
    $hodName = $h['hod_first_name'] . ' ' . $h['hod_last_name'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <?php
        if ($_SESSION['login_user_access_type'] == 1 || $_SESSION['login_user_access_type'] == 4) { ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Employees</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                    <div>
                                        <?php
                                        if ($_SESSION['login_user_access_type'] == 1) {
                                            echo  $con->query("SELECT * FROM employees;")->num_rows;
                                        } else if ($_SESSION['login_user_access_type'] == 4) {
                                            echo  $con->query("SELECT * FROM employees WHERE emp_hod_name='$hodName'")->num_rows;
                                        } ?>
                                    </div>
                                    <div style="font-size:2rem">
                                        <i class="fas fa-fw fa-users-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($_SESSION['login_user_access_type'] == 1) { ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Application Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                        <div>
                                            <?php echo  $con->query("SELECT * FROM users;")->num_rows ?>
                                        </div>
                                        <div style="font-size:2rem">
                                            <i class="fa-solid fa-person-circle-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-dangers shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clients</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                        <div>
                                            <?php echo  $con->query("SELECT * FROM clients;")->num_rows ?>
                                        </div>
                                        <div style="font-size:2rem">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php
                                    if ($_SESSION['login_user_access_type'] == 2) {
                                        echo $con->query("SELECT * FROM  projects WHERE FIND_IN_SET('$userId', users_id);")->num_rows;
                                    } else if ($_SESSION['login_user_access_type'] == 4) {
                                        echo $con->query("SELECT * FROM projects WHERE hod_id='$hodId'")->num_rows;
                                    } else if ($_SESSION['login_user_access_type'] == 3) {
                                    } else if ($_SESSION['login_user_access_type'] == 1) {
                                        echo $con->query("SELECT * FROM  projects;")->num_rows;
                                    }
                                    ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-list-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Assigned Task</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php
                                    if ($_SESSION['login_user_access_type'] == 2) {
                                        echo $con->query("SELECT * FROM task WHERE task_assign_to='$userId';")->num_rows;
                                    } else if ($_SESSION['login_user_access_type'] == 4) {
                                        $empId = $_SESSION['login_emp_id'];
                                        $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                        while ($h = $hodQry->fetch_assoc()) {
                                            $hodId = $h['hod_id'];
                                            echo $con->query("SELECT * FROM task WHERE task_assign_from='$hodId'")->num_rows;
                                            // echo $con->query("SELECT * FROM task WHERE task_assign_from='$userId';")->num_rows;
                                        }
                                    } else if ($_SESSION['login_user_access_type'] == 3) {
                                    } else if ($_SESSION['login_user_access_type'] == 1) {
                                        echo $con->query("SELECT * FROM task;")->num_rows;
                                    }
                                    ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Leave Applications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 d-flex align-items-center justify-content-between">
                                <div>
                                    <?php
                                    if ($_SESSION['login_user_access_type'] == 2) {
                                        echo $con->query("SELECT * FROM leaves WHERE user_id='$userId';")->num_rows;
                                    } else if ($_SESSION['login_user_access_type'] == 4) {
                                        echo $con->query("SELECT * FROM leaves WHERE user_id='$userId';")->num_rows;
                                    } else if ($_SESSION['login_user_access_type'] == 1) {
                                        echo $con->query("SELECT * FROM leaves;")->num_rows;
                                    }
                                    ?>
                                </div>
                                <div style="font-size:2rem">
                                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <?php include './project-report.php' ?>
    </div>
</div>
<!-- /.container-fluid -->