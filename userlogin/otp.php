<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    function otpmail($recipientEmail){
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable verbose debug output in production
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'shiva4523e@gmail.com'; // SMTP username
            $mail->Password   = 'sjkm fvml paak gldo'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to
            
            //Recipients
            $mail->setFrom('shiva4523e@gmail.com', 'Sivam');
            $mail->addAddress($recipientEmail); // Add a recipient
            
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Your OTP';
            $OTP = random_int(100000, 999999); // Generate OTP
            $mail->Body    = "Your OTP is: $OTP";
        
            $mail->send();
            echo 'Message has been sent';
            return $OTP; // Return the OTP for further processing
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false; // Return false if the email wasn't sent
        }
    }

    if (isset($_POST['sendotp'])) {
        $email = $_POST['emailofuser']; // Get the email from the form
        $otp = otpmail($email); // Send the OTP
        if($otp){
            $_SESSION['otp_sent'] = true; // Set a session variable when the OTP is sent
            $_SESSION['otp'] = $otp; // Store the OTP in a session variable for verification
        }
    }
    
    if (isset($_POST['verifyotp'])) {
        $userOtp = $_POST['otp']; // OTP entered
        if(isset($_SESSION['otp']) && $userOtp == $_SESSION['otp']){
            // If OTP is correct
            unset($_SESSION['otp']);
            echo("LOGGED IN");
        } else {
            // If OTP is incorrect
        }
    }
    
    $otpDisplayStyle = isset($_SESSION['otp_sent']) && $_SESSION['otp_sent'] ? 'block' : 'none';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP verification</title>
        <link rel="stylesheet" href="otp.css">
    </head>
    <body>
        <form action="otp.php" method="post">
            <div class="otp-form">
                <div class="title">
                    OTP Verification
                </div>
                <div class="input" >
                    <label for="email">Enter Your Email</label>
                    <input name="emailofuser" type="email" placeholder="Enter Email...">
                </div>
                <button name="sendotp" class="btn">Send OTP</button>
                <div class="otp-verify" style="display: <?php echo $otpDisplayStyle; ?>;">
                    <label for="otp">Enter OTP</label>
                    <input name="otp" type="text" placeholder="Enter the OTP sent to your Email...">
                    <button name="verifyotp" class="btn" >Login</button>
                </div>
            </div>
        </form>
    </body>
</html>