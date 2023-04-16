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

    .error {
        color: #ff0000 !important;
        position: relative !important;
        line-height: 1 !important;
        font-size: 1rem !important;
        width: 100% !important;
        text-align: left !important;
    }

    .form-control.error {
        border: 1px solid #ff0000;
        color: #5a5c69 !important
    }
</style>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <img class="mb-4" src="./assets/img/login.png" alt="Img" width="150" height="150">
        <h1 class="h3 mb-3 fw-bold ">OTP Verification</h1>
        <form id="otp_verify_form" class="my-5">
            <div class="form-group" id="otpField">
                <input type="number" class="form-control" id="user_otp" name="user_otp" autocomplete="off" autofocus>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary btn-user btn-block " id="submitOtpBtn" type="submit">Submit OTP</button>
            </div>
            <div id="loginLink">
                <a href="./user-login.php">Login With Password</a>
            </div>
        </form>
    </main>
    <?php include './bottom.components.php' ?>

</body>

</html>