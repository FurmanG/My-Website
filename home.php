<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Home - My Website</title>
	
	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-XVDW7BCQYV"></script>
	<script> 
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-XVDW7BCQYV'); 
	</script>
	
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/home.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: left;
            padding: 40px 20px;
        }
		.lang-switch {
			position: absolute;
			top: 10px;
			right: 10px;
			background-color: rgba(0, 0, 0, 0.5);
			padding: 26px 76px;
			border-radius: 6px;
		}

		.lang-switch a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}
		.lang-switch a:hover {
			text-decoration: underline;
		}
		.intro {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        .button-grid a {
            display: block;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .button-grid a:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }
		.logout {
			margin-top: 20px;
			display: inline-block;
			background-color: rgba(0, 0, 0, 0.6); /* Dark semi-transparent background */
			color: #ffdddd;
			text-decoration: none; /* Remove underline */
			padding: 10px 20px;
			border-radius: 8px;
			font-weight: bold;
			transition: background-color 0.3s;
		}

		.logout:hover {
			background-color: rgba(0, 0, 0, 0.8); /* Darker on hover */
			text-decoration: underline; /* Add underline on hover */
		}
		
		.contact-button {
			position: fixed;
			bottom: 20px;
			left: 20px;
			background-color: rgba(0, 0, 0, 0.6);
			color: white;
			padding: 12px 20px;
			border-radius: 8px;
			text-decoration: none;
			font-weight: bold;
			transition: background-color 0.3s;
			z-index: 1000;
		}
		.contact-button:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}
    </style>
</head>
<body>
    <div class="intro">
		<p>Thank you for visiting my website.</p>
		<p>I am still working on the site, correcting and adding content.</p>
		<p>This site includes writings and links that I believe are worth reading and watching.</p>
		<p>If what’s written here doesn’t speak to you, that’s perfectly okay — you’re welcome to set it aside.</p>
		<p>In sharing these writings and links, I do not claim to possess or know the truth.</p>
		<p>I simply wish to share the knowledge that has helped me — knowledge I believe to be true, and which has helped many others find peace, health and happiness.</p>
    </div>

    <div class="button-grid">
	    <a href="mywriting.php">Philosophical Writings</a>
		<a href="Wisdom.php">Wisdom Writings</a>
        <a href="Spirituality.php">Spirituality - Links</a>
        <a href="health.php">Health - Links</a>
        <a href="funny.php">Funny - Links</a>
        <a href="History.php">History!? - Links</a>
        <a href="images.php">Photos</a>
        <a href="Futur1.php">Future</a>
        <a href="Futur2.php">Future</a>
	</div>
	<a class="contact-button" href="contact.php">Contact Me</a>
</body>
</html>
