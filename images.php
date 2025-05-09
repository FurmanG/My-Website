<?php
$imagesFolder = "pictures/";
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

$images = array_values(array_filter(glob($imagesFolder . "*"), function($file) use ($allowedExtensions) {
    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $allowedExtensions);
}));
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .image-gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.6);
            cursor: pointer;
        }

        .logout {
            margin-top: 30px;
            display: block;
            text-align: center;
            color: #ffdddd;
            text-decoration: underline;
        }

        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 80vh;
            border-radius: 10px;
        }

        .lightbox .nav {
            color: white;
            font-size: 3em;
            cursor: pointer;
            user-select: none;
            margin: 0 30px;
        }

		.lightbox .controls {
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100%;
			height: 100%;        /* 👈 match height */
			position: absolute;
			top: 0;
			left: 0;
			z-index: 1001;
			pointer-events: none; /* allow inner nav buttons to catch clicks only */
		}

		.lightbox .nav {
			pointer-events: all; /* re-enable pointer events for the nav buttons */
		}


		.lightbox .nav {
			font-size: 3em;
			color: white;
			cursor: pointer;
			user-select: none;
			padding: 30px;
			z-index: 1002;
		}
		
		.lightbox .nav {
			width: 80px;             /* 👈 wider clickable area */
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 3em;
			color: white;
			cursor: pointer;
			user-select: none;
			background: rgba(0, 0, 0, 0.2); /* Optional: visible area */
			transition: background 0.2s;
		}

		.lightbox .nav:hover {
			background: rgba(0, 0, 0, 0.4);
		}



        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 2em;
            color: white;
            cursor: pointer;
        }
		.back-button {
			display: inline-block;
			background-color: rgba(0, 0, 0, 0.7); /* Dark background */
			color: white;
			padding: 10px 20px;
			border-radius: 8px;
			text-decoration: none;
			font-weight: bold;
			transition: background-color 0.3s;
		}

		.back-button:hover {
				background-color: rgba(0, 0, 0, 0.9); /* Darker on hover */
				text-decoration: underline;
		}

    </style>
</head>
<body>
	<p><a href="home.php" class="back-button">← Back to Home</a></p>
    <h1>My Picture Gallery</h1>

    <div class="image-gallery">
        <?php foreach ($images as $index => $image): ?>
            <img src="<?php echo $image; ?>" data-index="<?php echo $index; ?>" alt="Image">
        <?php endforeach; ?>
    </div>

	<div class="lightbox" id="lightbox">
		<span class="lightbox-close" onclick="closeLightbox()">&times;</span>

		<div class="controls">
			<span class="nav" id="prev">&#10094;</span>
			<img id="lightbox-img" src="" alt="Large Image">
			<span class="nav" id="next">&#10095;</span>
		</div>
	</div>
	<p><a href="home.php" class="back-button">← Back to Home</a></p>

    <script>
        const images = <?php echo json_encode($images); ?>;
        const galleryImages = document.querySelectorAll('.image-gallery img');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        let currentIndex = 0;

        galleryImages.forEach(img => {
            img.addEventListener('click', () => {
                currentIndex = parseInt(img.dataset.index);
                openLightbox(currentIndex);
            });
        });

        function openLightbox(index) {
            lightboxImg.src = images[index];
            lightbox.style.display = 'flex';
        }

        function closeLightbox() {
            lightbox.style.display = 'none';
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            lightboxImg.src = images[currentIndex];
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            lightboxImg.src = images[currentIndex];
        }

        // Close on ESC or click outside image
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") closeLightbox();
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox || e.target === lightboxImg) return;
            closeLightbox();
        });
		
		document.getElementById("next").addEventListener("click", function(e) {
			e.stopPropagation(); // Prevent background click
			nextImage();
		});

		document.getElementById("prev").addEventListener("click", function(e) {
			e.stopPropagation(); // Prevent background click
			prevImage();
		});

    </script>
</body>
</html>
