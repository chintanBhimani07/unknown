<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "./config/db.config.php";
$_SESSION['title'] = '';
if (isset($_SESSION['login_user_id'])) {
    header("location: ./index.php?page=home");
}
?>

<?php
include './head.components.php'
?>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-bottom: 10rem;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 25vw;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }
</style>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <img class="mb-4" src="./assets/img/login.png" alt="Img" width="150" height="150">
        <h1 class="h3 mb-3 fw-bold ">Login Here</h1>
        <form id="user_login" class="my-5">
            <div class="form-group">
                <input type="email" class="form-control " id="user_email" name="user_email" placeholder="name@example.com" autocomplete="off" autofocus>
            </div>
            <div class="form-group position-relative">
                <input type="password" class="form-control " id="user_password" name="user_password" placeholder="Enter Password" autocomplete="off">
                <i type="button" class="fa-solid fa-eye position-absolute" id="showPassword" style="top:12px;right:10px"></i>
                <i type="button" class="fa-solid fa-eye-slash position-absolute" id="hidePassword" style="top:12px;right:10px"></i>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary btn-user btn-block" id="loginBtn" type="submit">Log In</button>
            </div>
            <div>
                <a href="./recovery-password.php">Forget Password</a>
            </div>
        </form>
    </main>
    <?php include './bottom.components.php' ?>
</body>
<script>
    $(document).ready(function() {
        $('#hidePassword').hide();
        $('#showPassword').hide();

        $('#showPassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $("#showPassword").hide();
                $('#hidePassword').show();
            }
        });
        $('#hidePassword').click(function() {
            let passwordField = $('#user_password');
            let fieldType = passwordField.attr('type');
            if (fieldType === 'text') {
                passwordField.attr('type', 'password');
                $("#hidePassword").hide();
                $('#showPassword').show();
            }
        });

        $('#user_password').on('input', function() {
            if ($(this).val().length > 0) {
                $("#showPassword").show();

            } else {
                $("#showPassword").hide();
                $("#hidePassword").hide();
            }
        });
    });
</script>

</html>



