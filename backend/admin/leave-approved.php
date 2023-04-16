<?php
$userId = $_SESSION['login_user_id'];
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Approved Leaves</h1>
    </div>
    <div class="row scroll-component">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Approved Leaves</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Applied On</th>
                                    <th>Current Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($_SESSION['login_user_access_type'] == 1){
                                    $qry = $con->query("SELECT * FROM leaves WHERE leave_status=2;");
                                }else if($_SESSION['login_user_access_type'] == 2 || $_SESSION['login_user_access_type'] == 4){
                                    $qry = $con->query("SELECT * FROM leaves WHERE leave_status=2 AND user_id='$userId';");
                                }
                                $i = 1;
                                while ($row = $qry->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php
                                            $userId = $row['user_id'];
                                            $user = $con->query("SELECT * FROM users WHERE user_id='$userId'");
                                            while ($r = $user->fetch_assoc()) {
                                                echo $r['user_first_name'] . " " . $r['user_last_name'];
                                            }
                                            ?></td>
                                        <td><?php
                                            $typeId = $row['leave_type'];
                                            $leaveType = $con->query("SELECT * FROM leavestype WHERE leave_type_id ='$typeId'");
                                            while ($r = $leaveType->fetch_assoc()) {
                                                echo $r['leave_type'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row['posting_date'] == '0000-00-00') {
                                                echo "";
                                            } else {
                                                echo $row['posting_date'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row['leave_status'] == 0) { ?>
                                                <span style="color: blue">Pending</span>
                                            <?php } else if ($row['leave_status'] == 1) { ?>
                                                <span style="color: red">Decline</span>
                                            <?php } else { ?>
                                                <span style="color: green">Approved</span>
                                            <?php } ?>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle text-dark" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in dropdown-color" aria-labelledby="productDropdown">
                                                    <a type="button" class="dropdown-item" href="./index.php?page=leave-viewer&leaveId=<?php echo $row['leave_id'] ?>">View</a>
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
