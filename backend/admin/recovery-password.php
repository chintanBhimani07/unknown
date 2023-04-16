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
        <h1 class="h3 mb-3 fw-bold ">Password Reset</h1>
        <form id="reset_password" class="my-5">
            <div class="form-group" id="emailField">
                <input type="email" class="form-control " id="user_email" name="user_email" placeholder="name@example.com" autocomplete="off" autofocus>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary btn-user btn-block " id="sendOtpBtn" type="submit">Send OTP</button>
            </div>
            <div>
                <a href="./user-login.php">Login With Password</a>
            </div>
        </form>
    </main>
    <?php include './bottom.components.php' ?>

</body>

</html>