<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Projects</h1>
        <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
            <a href="./index.php?page=project-new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>Add Project</a>
        <?php } ?>
    </div>
    <div class='scroll-component'>

        <?php if ($_SESSION['login_user_access_type'] == 1 || $_SESSION['login_user_access_type'] == 4) { ?>
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
                                            echo $con->query("SELECT * FROM projects;")->num_rows . ' ' . 'Projects';
                                        } else if ($_SESSION['login_user_access_type'] == 4) {
                                            $empId = $_SESSION['login_emp_id'];
                                            $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                            while ($h = $hodQry->fetch_assoc()) {
                                                $hodId = $h['hod_id'];
                                                echo $con->query("SELECT * FROM projects WHERE hod_id='$hodId'")->num_rows . ' ' . 'Projects';
                                            }
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
                                            echo $con->query("SELECT * FROM projects WHERE project_status=1;")->num_rows . ' ' . 'Projects';
                                        } else if ($_SESSION['login_user_access_type'] == 4) {
                                            $empId = $_SESSION['login_emp_id'];
                                            $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                            while ($h = $hodQry->fetch_assoc()) {
                                                $hodId = $h['hod_id'];
                                                echo $con->query("SELECT * FROM projects WHERE hod_id='$hodId' AND project_status=1")->num_rows . ' ' . 'Projects';
                                            }
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
                                            echo $con->query("SELECT * FROM projects WHERE project_status=2;")->num_rows . ' ' . 'Projects';
                                        } else if ($_SESSION['login_user_access_type'] == 4) {
                                            $empId = $_SESSION['login_emp_id'];
                                            $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                            while ($h = $hodQry->fetch_assoc()) {
                                                $hodId = $h['hod_id'];
                                                echo $con->query("SELECT * FROM projects WHERE hod_id='$hodId' AND project_status=2")->num_rows . ' ' . 'Projects';
                                            }
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
                                        <?php
                                        if ($_SESSION['login_user_access_type'] == 1) {
                                            echo $con->query("SELECT * FROM projects WHERE project_status=0;")->num_rows . ' ' . 'Projects';
                                        } else if ($_SESSION['login_user_access_type'] == 4) {
                                            $empId = $_SESSION['login_emp_id'];
                                            $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                            while ($h = $hodQry->fetch_assoc()) {
                                                $hodId = $h['hod_id'];
                                                echo $con->query("SELECT * FROM projects WHERE hod_id='$hodId' AND project_status=0")->num_rows . ' ' . 'Projects';
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Project</th>
                                        <th>Client</th>
                                        <th>HOD</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = '';
                                    $i = 1;
                                    if ($_SESSION['login_user_access_type'] == 2) {
                                        $userId = $_SESSION['login_user_id'];
                                        $qry = $con->query("SELECT * FROM  projects WHERE FIND_IN_SET('$userId', users_id);");
                                    } else if ($_SESSION['login_user_access_type'] == 4) {
                                        $empId = $_SESSION['login_emp_id'];
                                        $hodQry = $con->query("SELECT hod_id FROM hod WHERE emp_id='$empId'");
                                        while ($h = $hodQry->fetch_assoc()) {
                                            $hodId = $h['hod_id'];
                                            $qry = $con->query("SELECT * FROM projects WHERE hod_id='$hodId'");
                                        }
                                    } else if ($_SESSION['login_user_access_type'] == 3) {
                                    } else if ($_SESSION['login_user_access_type'] == 1) {
                                        $qry = $con->query("SELECT * FROM  projects;");
                                    }
                                    while ($row = $qry->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $i++ ?>
                                            </th>
                                            <td>
                                                <?php echo $row['project_name'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $clientId = $row['client_id'];
                                                $client = $con->query("SELECT client_first_name,client_last_name FROM clients WHERE client_id='$clientId'");
                                                while ($data = $client->fetch_assoc()) {
                                                    echo $data['client_first_name'] . " " . $data['client_last_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $hodId = $row['hod_id'];
                                                $hod = $con->query("SELECT hod_first_name,hod_last_name FROM hod WHERE hod_id='$hodId'");
                                                while ($data = $hod->fetch_assoc()) {
                                                    echo $data['hod_first_name'] . " " . $data['hod_last_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $row['start_date'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['expected_end_date'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['project_status'] == 2) { ?>
                                                    <span style="color: green">Complete</span>
                                                <?php } else if ($row['project_status'] == 1) { ?>
                                                    <span style="color: blue">Running</span>
                                                <?php } else { ?>
                                                    <span style="color: red">Hold</span>
                                                <?php } ?>
                                            </td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <div class="dropdown no-arrow">
                                                    <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                        <a type="button" class="dropdown-item" href="./index.php?page=project-viewer&projectId=<?php echo $row['project_id'] ?>">View</a>
                                                        <?php
                                                        if ($_SESSION['login_user_access_type'] == 1) { ?>
                                                            <div class="dropdown-divider"></div>
                                                            <a type="button" class="dropdown-item" href="./index.php?page=project-edit&projectId=<?php echo $row['project_id'] ?>">Edit</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
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
</div>



<div class="modal" id="openModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; background:#3e64d3;color:#fff">
                <h5 class="modal-title" id="addStatusModalLabel">Remove Project</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to remove project permanently?</p>
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
        $('#openModal').hide();
        $(document).on('click', '#deleteProject', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            $.ajax({
                url: './php/actions.php?action=delete_project',
                method: 'POST',
                data: {
                    project_id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        console.log(resp);
                    }
                },
                error: function(resp) {
                    console.log(resp);
                }
            });
        });
    });
</script>