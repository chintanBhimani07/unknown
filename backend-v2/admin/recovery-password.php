<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "./config/db.config.php";

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
        <form id="otp_verify_form" class="my-5">
            <div class="form-group" id="otpField">
                <input type="number" class="form-control" id="user_otp" name="user_otp" autocomplete="off"  autofocus>
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
<script>
    $(document).ready(function() {
        $('#otp_verify_form').hide();
        $('#loginLink').hide();
        
        $("#reset_password").validate({
            // Define validation rules
            rules: {
                user_email: "required",
                user_email: {
                    required: true,
                    email: true,
                },
            },
            // Specify validation error messages
            messages: {
                user_email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: './php/actions.php?action=email_verification',
                    data: $("#reset_password").serialize(),
                    type: 'POST',
                    success: function(res) {
                        console.log(res);
                        res = JSON.parse(res);
                        if (res.status == 200) {
                            $('#reset_password').prepend(`
                            <div class="alert alert-success  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>
                                    `);
                            setTimeout(() => {
                                $('#otp_verify_form').show();
                                $('#reset_password').hide();
                            }, 2000);
                        } else {
                            $('#reset_password').prepend(`
                            <div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>
                                    `);
                        }
                        setTimeout(() => {
                            $('.show').hide();
                        }, 2000)
                    }
                });
            }
        });
        $("#otp_verify_form").validate({
            // Define validation rules
            rules: {
                user_otp: "required",
                user_otp: {
                    required: true,
                    length:6
                },
            },
            // Specify validation error messages
            messages: {
                user_otp: {
                    required: "Please enter OTP",
                    length: "Please Provide valid OTP ",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: './php/actions.php?action=otp_verification',
                    data: $("#otp_verify_form").serialize(),
                    type: 'POST',
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.status == 200) {
                            $('#otp_verify_form').prepend(`
                            <div class="alert alert-success  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>
                                    `);
                            setTimeout(() => {
                                $('#loginLink').show();
                            }, 2000);
                        } else {
                            $('#reset_password').prepend(`
                            <div class="alert alert-danger  showMessage" role="alert" id="errorMsg">
                                    <span>${res.message}</span>
                                    </div>
                                    `);
                        }
                        setTimeout(() => {
                            $('.show').hide();
                        }, 3000)
                    }
                });
            }
        });
    });
</script>

</html>