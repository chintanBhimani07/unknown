<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
    </div>
    <div class="row add-employee-form">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fill Up Details</h6>
                </div>

                <div class="card-body">
                    <form id="change_user_form">
                        <input type="hidden" class="form-control mb-5" id="user_id" name="user_id" value="<?php echo $_SESSION['login_user_id'] ?>">
                        <div class="form-group position-relative">
                            <label for="user_old_password" class="col-form-label mr-1">Old Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="user_old_password" name="user_old_password" autocomplete="off">
                            <i type="button" class="fa-solid fa-eye position-absolute" id="showOldPassword" style="top:50px;right:10px"></i>
                            <i type="button" class="fa-solid fa-eye-slash position-absolute" id="hideOldPassword" style="top:50px;right:10px"></i>
                        </div>
                        <div class="form-group position-relative">
                            <label for="user_password" class="col-form-label mr-1">New Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="user_password" name="user_password" autocomplete="off">
                            <i type="button" class="fa-solid fa-eye position-absolute" id="showNewPassword" style="top:50px;right:10px"></i>
                            <i type="button" class="fa-solid fa-eye-slash position-absolute" id="hideNewPassword" style="top:50px;right:10px"></i>
                        </div>
                        <div class="form-group">
                            <label for="user_confirm_password" class="col-form-label mr-1">Confirm Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="user_confirm_password" name="user_confirm_password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#hideNewPassword').hide();
        $('#showNewPassword').hide();
        $('#hideOldPassword').hide();
        $('#showOldPassword').hide();

        // New Password
        $('#showNewPassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $("#showNewPassword").hide();
                $('#hideNewPassword').show();
            }
        });
        $('#hideNewPassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'text') {
                passwordField.attr('type', 'password');
                $("#hideNewPassword").hide();
                $('#showNewPassword').show();
            }
        });

        $('#user_password').on('input', function() {
            if ($(this).val().length > 0) {
                $("#showNewPassword").show();

            } else {
                $("#showNewPassword").hide();
                $("#hideNewPassword").hide();
            }
        });

        // Old Password
        $('#showOldPassword').click(function() {
            let passwordField = $('#user_old_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $("#showOldPassword").hide();
                $('#hideOldPassword').show();
            }
        });
        $('#hideOldPassword').click(function() {
            let passwordField = $('#user_old_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'text') {
                passwordField.attr('type', 'password');
                $("#hideOldPassword").hide();
                $('#showOldPassword').show();
            }
        });

        $('#user_old_password').on('input', function() {
            if ($(this).val().length > 0) {
                $("#showOldPassword").show();

            } else {
                $("#showOldPassword").hide();
                $("#hideOldPassword").hide();
            }
        });
    });
</script>