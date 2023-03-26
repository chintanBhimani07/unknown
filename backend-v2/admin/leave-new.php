<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Leave Application</h1>
        <?php
        if ($_SESSION['login_user_access_type'] != 2) { ?>
            <a href="./index.php?page=leave-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white mr-2"></i>All Leave</a>
        <?php } ?>
    </div>

    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>
                <div class="card-body">
                    <form id="new_leave">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['login_user_id'] ?>" autocomplete="off">
                        <input type="hidden" class="form-control" id="leave_status" name="leave_status" value="<?php echo 0 ?>" autocomplete="off">
                        <input type="hidden" class="form-control" id="is_read" name="is_read" value="<?php echo 0 ?>" autocomplete="off">
                        <div class="form-group">
                            <label for="leave_type" class="col-form-label mr-1">Leave Type</label><span class="text-danger">*</span>
                            <select class="form-control custom-select" id="leave_type" name="leave_type" autofocus>
                                <option value="" selected>Select Leave Type</option>
                                <?php
                                $qry = $con->query("SELECT leave_type,leave_type_id FROM leavestype ORDER BY leave_type ASC;");
                                while ($r = $qry->fetch_assoc()) { ?>
                                    <option value="<?php echo $r['leave_type_id'] ?>"><?php echo $r['leave_type']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="leave_description" class="col-form-label mr-1">Leave Description</label>
                            <textarea type="text" class="form-control" id="leave_description" name="leave_description" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="from_date" class="col-form-label mr-1">Starting Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="from_date" name="from_date" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="to_date" class="col-form-label mr-1">Ending Date</label><span class="text-danger">*</span>
                                <input type="date" class="form-control" id="to_date" name="to_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button class="btn btn-primary btn-user btn-block">Submit Details</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="./index.php?page=leave-dashboard" class="btn btn-warning btn-user btn-block text-dark">Back to Leave List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
