<?php
session_start();
$siteKey = '6LcRliwrAAAAAKDCIFm8Tk_GOE0ua1RMa8Am06R8'; //  Replace with your Google reCAPTCHA Site Key
$secretKey = '6LcRliwrAAAAAKg9s6mnjc_lvdMKK_7W0WC6_cKl'; //  Replace with your Google reCAPTCHA Secret Key



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify CAPTCHA with Google
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $captchaSuccess = json_decode($verify)->success;

    if ($captchaSuccess) {
        $to = "your@email.com";
        $subject = "New Contact Message from $name";
        $body = "From: $name <$email>\n\n$message";
        $headers = "From: $email";

        $success = mail($to, $subject, $body, $headers);
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
            padding: 20px;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
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
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($success) && $success): ?>
    <h2>Message Sent!</h2>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>Failed to Send Message</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
<?php else: ?>
    <h2>Contact Me</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
        <div class="g-recaptcha" data-sitekey="<?= $siteKey ?>"></div>
        <button type="submit">Send</button>
    </form>
<?php endif; ?>
    <a class="back-link" href="home.php">Back to Home</a>
</div>
</body>
</html>