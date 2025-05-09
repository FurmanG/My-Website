<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Funny</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding: 40px;
        }
        .content {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
        }
        iframe {
            margin-top: 20px;
            width: 100%;
            height: 400px;
        }
        a {
            color: #ffdddd;
        }
    </style>
</head>
<body>
    <div class="content">
	 <p><a href="home.php">← Back to Home</a></p>
	     <h1>Funny videos</h1>
         <h2>My recommended videos</h2>
        <iframe src="https://www.youtube.com/embed/qBMSv9A5ouU?si=9QMtKtpQsIxHTksx" frameborder="0" allowfullscreen></iframe>
		<iframe src="https://www.youtube.com/embed/iyvzBGwD1vs?si=U5yFHObvjuvUGiqJ" frameborder="0" allowfullscreen></iframe>
		<iframe src="https://www.youtube.com/embed/j0m4rcx0of4?si=S3r-e8_e_qQGfSii" frameborder="0" allowfullscreen></iframe>
        <p><a href="home.php">← Back to Home</a></p>
    </div>
</body>
</html>

