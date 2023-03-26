<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sidebar-scroll" id="main_dashboard" style="height: 100vh !important;overflow: auto !important;width: 17vw !important;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php?page=home">
            <div class="sidebar-brand-text mx-3">DS Architecture</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="./index.php?page=home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employee_dashboard" aria-expanded="true" aria-controls="employee_controls">
                    <i class="fas fa-fw fa-users-gear"></i>
                    <span>Employee</span>
                </a>
                <div id="employee_dashboard" class="collapse" aria-labelledby="employee_lable" data-parent="#main_dashboard">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./index.php?page=employee-dashboard">All Employees</a>
                        <a class="collapse-item" href="./index.php?page=employee-new">New Employee</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user_dashboard" aria-expanded="true" aria-controls="employee_controls">
                    <i class="fa-solid fa-person-circle-check"></i>
                    <span>Application Users</span>
                </a>
                <div id="user_dashboard" class="collapse" aria-labelledby="employee_lable" data-parent="#main_dashboard">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./index.php?page=user-dashboard">All User</a>
                        <a class="collapse-item" href="./index.php?page=user-new">New User</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave_type" aria-expanded="true" aria-controls="project_controls">
                    <i class="fa-solid fa-t"></i>
                    <span>Leave Types</span>
                </a>
                <div id="leave_type" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./index.php?page=leave-types">Dashboard</a>
                        <a class="collapse-item" href="./index.php?page=leaveType-new">New Leave Type</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#project_dashboard" aria-expanded="true" aria-controls="project_controls">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Projects</span>
                </a>
                <div id="project_dashboard" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./index.php?page=project-dashboard">Dashboard</a>
                        <a class="collapse-item" href="./index.php?page=project-new">New Project</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#client_dashboard" aria-expanded="true" aria-controls="project_controls">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Clients</span>
                </a>
                <div id="client_dashboard" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./index.php?page=client-dashboard">Dashboard</a>
                        <a class="collapse-item" href="./index.php?page=client-new">New Client</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=lead-dashboard">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Lead Entry</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=task-dashboard">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Task Management</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=hod-dashboard">
                    <i class="fa-solid fa-building-user"></i>
                    <span>Head Of Departments</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=expenses-dashboard">
                    <i class="fa-solid fa-wallet"></i>
                    <span>Expenses</span>
                </a>
            </li>
        <?php } ?>
        <?php
        if ($_SESSION['login_user_access_type'] == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=work-collector">
                    <i class="fa-solid fa-laptop-file"></i>
                    <span>Work Collector</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=project-dashboard">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Projects</span>
                </a>
            </li>
        <?php } ?>

        <?php if ($_SESSION['login_user_access_type'] == 4) { ?>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=employee-dashboard">
                    <i class="fas fa-fw fa-users-gear"></i>
                    <span>Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=project-dashboard">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=client-dashboard">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Clients</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=task-dashboard">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Task Management</span>
                </a>
            </li>
        <?php } ?>
        <?php
        if ($_SESSION['login_user_access_type'] == 2 || $_SESSION['login_user_access_type'] == 4) { ?>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=leave-new">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span>Leave Application</span>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave_management" aria-expanded="true" aria-controls="project_controls">
                <i class="fa-solid fa-person-walking-arrow-right"></i>
                <span>Leave Management</span>
            </a>
            <div id="leave_management" class="collapse" aria-labelledby="project_lable" data-parent="#main_dashboard">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="./index.php?page=leave-dashboard">Dashboard</a>
                    <a class="collapse-item" href="./index.php?page=leave-new">Add Leave</a>
                    <a class="collapse-item" href="./index.php?page=leave-pending">Pending Leaves</a>
                    <a class="collapse-item" href="./index.php?page=leave-approved">Approved Leaves</a>
                    <a class="collapse-item" href="./index.php?page=leave-declined">Declined Leaves</a>
                </div>
            </div>
        </li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            $userEmail = $_SESSION['login_user_email'];
                            $qry = $con->query("SELECT emp_profile_pic FROM employees WHERE emp_email='$userEmail'");
                            while ($row = $qry->fetch_assoc()) { ?>
                                <span class="mr-3" style="color:#000;font-size:14px">
                                    <?php echo $_SESSION['login_user_first_name'] . " " . $_SESSION['login_user_last_name'] ?>
                                </span>
                                <img class="img-profile rounded-circle" style="border: 0.5px solid #4d72de;height:3rem;width:3rem;" src="./assets/uploads/<?php echo $row['emp_profile_pic']; ?>">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-color" aria-labelledby="userDropdown">
                            <h6 class="text-center font-weight-bolder">
                                <?php if ($_SESSION['login_user_access_type'] == 1) {
                                    echo 'Administrator';
                                } else if ($_SESSION['login_user_access_type'] == 2) {
                                    echo 'Employee';
                                } else if ($_SESSION['login_user_access_type'] == 3) {
                                    echo 'Engineer';
                                } else if ($_SESSION['login_user_access_type'] == 4) {
                                    echo 'HOD';
                                } ?>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./index.php?page=employee-viewer&empId=<?php echo $_SESSION['login_emp_id'] ?>&content=user&isProfile=true">
                                <i class="fa-solid fa-user mr-2"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="./index.php?page=user-change-password">
                                <i class="fa-solid fa-unlock mr-2"></i>
                                Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./user-logout.php">
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>