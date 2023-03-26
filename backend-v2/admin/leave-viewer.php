<?php
$leaveId = $_GET['leaveId'];
$isPending = false;
$qry = $con->query("SELECT * FROM leaves WHERE leave_id ='$leaveId'");
while ($row = $qry->fetch_assoc()) {
    if ($row['leave_status'] == 0) {
        $isPending = true;
    }
    $userId = $row['user_id'];
    $user = $con->query("SELECT emp_id FROM users WHERE user_id='$userId'");
    while ($u = $user->fetch_assoc()) {
        $empId = $u['emp_id'];
        $emp = $con->query("SELECT * FROM employees WHERE emp_id='$empId'");
        while ($e = $emp->fetch_assoc()) { ?>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                        <?php echo $e['emp_first_name'] . " " . $e['emp_last_name'] . " " ?>Leave Application
                    </h1>
                    <a href="./index.php?page=leave-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>Leaves</a>
                </div>

                <div class="row scroll-component">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                            </a>
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 row justify-content-around">
                                            <div class="card col-lg-6 py-3 border-left-dark">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Full Name:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo ucwords($e['emp_first_name'] . " " . $e['emp_last_name']) ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Email
                                                                Address:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo $e['emp_email'] ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Contact No:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo $e['emp_mob'] ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Department:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo ucwords($e['emp_department']) ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Gender:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo ucwords($e['emp_gender']) ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Date Of Birth:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo ucwords($e['emp_dob']) ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col-lg-6  py-3 border-left-dark">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Leave Type:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php
                                                                $typeId = $row['leave_type'];
                                                                $leaveType = $con->query("SELECT * FROM leavestype WHERE leave_type_id ='$typeId'");
                                                                while ($r = $leaveType->fetch_assoc()) {
                                                                    echo $r['leave_type'];
                                                                } ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Leave From:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo $row['from_date'] ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Leave To:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo $row['to_date'] ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Leave Applied:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php echo ucwords($row['posting_date']) ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Status:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php
                                                                if ($row['leave_status'] == 0) { ?>
                                                                    <span style="color: blue">Pending</span>
                                                                <?php } else if ($row['leave_status'] == 1) { ?>
                                                                    <span style="color: red">Decline</span>
                                                                <?php } else { ?>
                                                                    <span style="color: green">Approved</span>
                                                                <?php } ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-3 my-2">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-500">Remark Date:</span>
                                                        </div>
                                                        <div class="col-lg-9 my-2">
                                                            <span class="font-weight-bold">
                                                                <?php
                                                                if (!empty($row['admin_remarks_date'])) {
                                                                    echo ucwords($row['admin_remarks_date']);
                                                                } else {
                                                                    echo "-";
                                                                } ?>
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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Extra Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 my-2">
                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Description:</span>
                                    </div>
                                    <div class="col-lg-10 my-2">
                                        <span class="font-weight-bold">
                                            <?php
                                            if (!empty($row['leave_description'])) {
                                                echo ucwords($row['leave_description']);
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-lg-2 my-2">
                                        <span class="mr-2 d-none d-lg-inline text-gray-500">Remark:</span>
                                    </div>
                                    <div class="col-lg-10 my-2">
                                        <span class="font-weight-bold">
                                            <?php
                                            if (!empty($row['admin_remarks'])) {
                                                echo ucwords($row['admin_remarks']);
                                            } else {
                                                echo '-';
                                            } ?>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <?php
                        if ($isPending && $_SESSION['login_user_access_type'] == 1) { ?>
                            <div class="d-flex align-items-center justify-content-around ">
                                <div class="w-50">
                                    <button class="btn btn-warning text-dark btn-user btn-block btnAction">Take Action</button>
                                    <button class="btn btn-danger text-light btn-user btn-block btnRemove">Remove Action</button>
                                </div>
                            </div>
                            <div class="row take_action mt-5">
                                <div class="col-xl-12 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                                        </div>
                                        <div class="card-body">
                                            <form id="leave_action">
                                                <input type="hidden" name="leave_id" value="<?php echo $leaveId; ?>">
                                                <div class="form-group">
                                                    <label for="leave_status" class="col-form-label mr-1">Leave Status</label><span class="text-danger">*</span>
                                                    <select class="form-control custom-select" id="leave_status" name="leave_status">
                                                        <option value="" selected>Select Status</option>
                                                        <option value="2">Approved</option>
                                                        <option value="1">Declined</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="admin_remarks" class="col-form-label mr-1">Admin Remarks</label><span class="text-danger">*</span>
                                                    <textarea type="text" class="form-control" id="admin_remarks" name="admin_remarks" autocomplete="off"></textarea>
                                                </div>
                                                <div class="form-group ">
                                                    <button class="btn btn-primary submitBtn btn-user btn-block">Submit Details</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
<?php
        }
    }
} ?>


<script>
    $(document).ready(function() {
        $('.take_action').hide();
        $('.btnRemove').hide();
        $('.btnAction').click(() => {
            $('.take_action').show();
            $('.btnAction').hide();
            $('.btnRemove').show();
        });
        $('.btnRemove').click(() => {
            $('.take_action').hide();
            $('.btnAction').show();
            $('.btnRemove').hide();
        });
    });
</script>