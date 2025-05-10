<?php
session_start();
$siteKey = '6LcRliwrAAAAAKDCIFm8Tk_GOE0ua1RMa8Am06R8';
$secretKey = '6LcRliwrAAAAAKg9s6mnjc_lvdMKK_7W0WC6_cKl';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $captchaSuccess = json_decode($verify)->success;

    if ($captchaSuccess) {
        $to = "gilfurman88@gmail.com";
        $subject = "New Contact Message from $name";
        $body = "From: $name <$email>\n\n$message";
        $headers = "From: gilfurman88@gmail.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $success = mail($to, $subject, $body, $headers);
        if (!$success) {
            error_log("Mail failed to send to $to");
        }
    } else {
        $error = "CAPTCHA verification failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/contact.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
            padding-top: 50px;
        }
        .form-box {
            background-color: rgba(0, 0, 0, 0.6);
            margin: auto;
            padding: 40px 20px;
            width: 90%;
            max-width: 600px;
            border-radius: 10px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-box">
    <div style="text-align: center; padding: 30px; font-family: Arial, sans-serif;">
        <h2>Contact Page Under Construction</h2>
        <p>Thank you for visiting!</p>
        <p>Our contact form is not yet functional — we’re still working on it.</p>
        <p>Please check back soon or reach out through another method if urgent.</p>
    </div>
    <a class="back-link" href="home.php">Back to Home</a>
</div>
</body>
</html>
