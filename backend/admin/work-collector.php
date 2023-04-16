<?php
$userId = $_SESSION['login_user_id'];
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if ($_SESSION['login_user_access_type'] == 1) { ?>
            <h1 class="h3 mb-0 text-gray-800">All Works</h1>
        <?php } else { ?>
            <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION['login_user_first_name'] . " " . $_SESSION['login_user_last_name'] ?>'s Works</h1>
        <?php } ?>
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

                                <?php echo  $con->query("SELECT * FROM task WHERE task_assign_to='$userId';")->num_rows . ' ' . 'Work' ?>
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
                                <?php echo $con->query("SELECT * FROM task WHERE task_assign_to='$userId' AND task_status=1;")->num_rows . ' ' . 'Work'; ?>
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
                                <?php echo $con->query("SELECT * FROM task WHERE task_assign_to='$userId' AND task_status=2;")->num_rows . ' ' . 'Work'; ?>
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
                                <?php echo $con->query("SELECT * FROM task WHERE task_assign_to='$userId' AND task_status=0;")->num_rows . ' ' . 'Work'; ?>
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
                                    <th>Task Assign From</th>
                                    <th>Task Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $qry = $con->query("SELECT * FROM task WHERE task_assign_to='$userId';");
                                while ($row = $qry->fetch_assoc()) {
                                ?>
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
                                            $hodId = $row['task_assign_from'];
                                            $taskEmp = $con->query("SELECT hod_first_name,hod_last_name FROM hod WHERE hod_id='$hodId';");
                                            while ($u = $taskEmp->fetch_assoc()) {
                                                echo $u['hod_first_name'] . " " . $u['hod_last_name'];
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
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="productDropdown">
                                                    <?php if ($row['task_status'] == 0) { ?>
                                                        <a type="button" class="dropdown-item" id="startWork" data-id="<?php echo $row['task_id'] ?>" href="#">Start Work</a>
                                                        <div class="dropdown-divider"></div>
                                                    <?php } else if ($row['task_status'] == 1) { ?>
                                                        <a type="button" class="dropdown-item" id="submitWork" data-id="<?php echo $row['task_id'] ?>" data-project="<?php echo $row['project_id'] ?>" href="#">Submit Work</a>
                                                        <div class="dropdown-divider"></div>
                                                    <?php } ?>
                                                    <a type="button" class="dropdown-item" id="viewWork" href="./index.php?page=work-view&taskId=<?php echo $row['task_id'] ?>">View Work</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
                <h5 class="modal-title" id="addStatusModalLabel">Start or Submit Work</h5>
                <button type="button" class="close closeModal" style="color:#fff">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="bodyText">Are you sure want to commit changes?</p>
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
        let process = '';
        let projectId = '';
        $('#openModal').hide();
        $(document).on('click', '#startWork', function(e) {
            e.preventDefault();
            process = 'start';
            id = $(this).data('id');
            $('#openModal').show();
        });
        $(document).on('click', '#submitWork', function(e) {
            projectId = $('#submitWork').data('project');
            e.preventDefault();
            process = 'submit';
            id = $(this).data('id');
            $('#openModal').show();
        });
        $('.closeModal').click(() => {
            $('#openModal').hide();
        });

        $('#submitModel').click(() => {
            $('#openModal').hide();
            $.ajax({
                url: './php/actions.php?action=work_update',
                method: 'POST',
                data: {
                    process: process,
                    taskId: id,
                    projectId: projectId
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