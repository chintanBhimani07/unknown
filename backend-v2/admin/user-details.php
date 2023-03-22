<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
        <a href="./index.php?page=user-dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white mr-2"></i>User Dashbaord</a>
    </div>
    <form id="get_user_details">
        <div class="form-group">
            <label for="emp_id" class="col-form-label mr-1">Select User</label><span class="text-danger">*</span>
            <select class="form-control custom-select" id="emp_id" name="emp_id">
                <option value="0">Select User</option>
                <?php
                ?>
                <option value="IT">IT</option>
                <option value="MDO">MDO</option>
                <option value="Architecture">Architecture</option>
                <option value="Engineer">Engineer</option>
                <option value="Interior">Interior</option>
                <option value="Finance">Finance</option>
            </select>
        </div>
    </form>
</div>