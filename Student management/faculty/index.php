<?php
    // if(isset($_SESSION['id'])){
    //     header("location:studentdetail.php");
    // }
    if(isset($_GET['fail']) && $_GET['fail'] == 1) {
        echo "<script>alert('Wrong password or wrong id')</script>";
    }
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user'])){
        if($_SESSION['user'] == 'faculty') {
            header("location:studentdetail.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faculty Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <link rel="stylesheet" href="style.css">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
    </head>
    <body>
    <?php
        include('../main_nav.php');
    ?>
        <div class="login-form">
            <div class="title">
                Faculty Login
            </div>
            <form action="login.php" method="post">

                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="id" placeholder="Enter Username...." required>
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password...." required>
                </div>
                <!-- <div class="captcha"> -->
                    <!-- <label for="captcha-in">Enter Captcha</label> -->
                    <!-- <div class="captcha-view"></div> -->
                    <!-- <div class="captcha-f"> -->
                        <!-- <input type="text", id="captcha-f" placeholder="Enter the Captcha..." required> -->
                        <!-- <button class="btn"><i class="fa-solid fa-arrows-rotate"></i></button> -->
                    <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="g-cap"> -->
                    <!-- <input id="checkb" style="width: 20px; height: 20px;" type="checkbox">&nbsp;&nbsp; -->
                    <!-- <label for="notb"><b>I,m not a robot</b></label> -->
                    <!-- <div id="captchaContainer" class="g-recaptcha"  -->
                        <!-- data-sitekey="6Lcy5Z4pAAAAAJd8V3APvuDGflgY9SSIF6ueqJa3"  -->
                        <!-- data-callback="onCaptchaSuccess"  -->
                        <!-- data-size="invisible"> -->
                    <!-- </div> -->
                <!-- </div> -->
                <div class="submit-b">
                    <button id="login-b" class="loginb" type="submit" name="submit" value="submit">Verify User</button>
                </div>
            </form>
        </div>
        <!-- <script src="https://kit.fontawesome.com/e227144cb8.js" crossorigin="anonymous"></script> -->
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <!-- <script src="index.js"></script> -->
    </body>
</html>