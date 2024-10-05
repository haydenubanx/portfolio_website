<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sentiment Analysis Extension for YouTube | Portfolio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
            color: #333;
            margin: 0;
            padding: 0;
        }

        .title-header {
            background-color: #fff;

        }

        header .title-text {
            text-align: center;
            background-color: #fff;
            font-weight: bold;
            margin-left: auto;
            margin-right: auto;
            font-size: 3rem;
            padding: 40px 0;
            color: #333;
            border-bottom: 3px solid darkorange;
        }

        .container {
            width: 85%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 40px;
        }

        .project-description {
            margin: 30px 0;
            padding-bottom: 30px;
            border-bottom: 2px solid #eee;
        }

        .project-description h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .project-description p {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
        }

        .carousel {
            position: relative;
            max-width: 90%;
            height: 500px;
            margin: 40px auto;
            text-align: center;
            overflow: hidden;
        }

        .carousel img {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            position: absolute;
            opacity: 0;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .carousel img.active {
            opacity: 1;
            position: relative;
        }

        .carousel img.slide-in-left, .carousel img.slide-in-right {
            transform: translateX(0);  /* Move to the center */
            opacity: 1;
        }

        .carousel img.slide-out-left {
            transform: translateX(-100%);  /* Slide out to the left */
            opacity: 0;
        }

        .carousel img.slide-out-right {
            transform: translateX(100%);  /* Slide out to the right */
            opacity: 0;
        }

        .carousel img.off-screen-left {
            transform: translateX(-100%);  /* Position off-screen to the left */
            opacity: 0;
        }

        .carousel img.off-screen-right {
            transform: translateX(100%);  /* Position off-screen to the right */
            opacity: 0;
        }

        .carousel .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            color: #ffa500;
            cursor: pointer;
            background-color: transparent;
            padding: 10px;
            border-radius: 50%;
            z-index: 100;
        }

        .carousel .arrow.left {
            left: 10px;
        }

        .carousel .arrow.right {
            right: 10px;
        }

        .key-features {
            margin: 30px 0;
        }

        .key-features ul {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            margin-left: 20px;
        }

        .key-features ul li {
            margin-bottom: 10px;
        }

        .github-link {
            text-align: center;
            margin: 50px 0;
        }

        .github-link a {
            padding: 14px 28px;
            background-color: #ffa500;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }


        .github-link a:hover {
            background-color: #333;
        }


        body:before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://www.transparenttextures.com/patterns/diagmonds-light.png') repeat, linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
            z-index: -1;
            opacity: 0.5; /* Subtle background texture */
        }
    </style>
</head>
<body>

<div class="container">
    <header class="title-header">
        <h1 class="title-text">Sentiment Analysis Chrome Extension for YouTube</h1>
    </header>

    <!-- Carousel section -->
    <section class="carousel">
        <div class="arrow left" onclick="nextImage()">&#10094;</div>
        <img id="carouselImage" class="active" src="../../../HTMLStructure/resources/images/chromeExtension.png" alt="Sentiment Analysis Extension Screenshot">
        <div class="arrow right" onclick="prevImage()">&#10095;</div>
    </section>

    <section class="project-description">
        <h2>Project Overview</h2>
        <p>This project showcases a <strong style="color: darkorange">Google Chrome extension</strong> that enhances the YouTube viewing experience by performing real-time <strong style="color: darkorange">Sentiment Analysis</strong> on comments associated with YouTube videos. By analyzing the sentiment of user comments, the extension categorizes them as <strong style="color: green">Positive</strong>, <strong style="color: dimgrey">Neutral</strong>, or <strong style="color: red">Negative</strong>, providing users with a quick and insightful overview of the audience’s mood and reaction towards a video.</p>

        <p>The extension also calculates a positivity percentage and displays a summary of the overall sentiment across all comments. Users can interactively improve the sentiment model by providing feedback, enabling better accuracy over time.</p>
    </section>

    <section class="project-description">
        <h2>Key Features</h2>
        <ul>
            <li>Real-time sentiment analysis of YouTube comments directly on the video page.</li>
            <li>Dynamic visualization of the overall sentiment score and percentage of positive comments.</li>
            <li>Interactive model training allows users to provide feedback and improve the sentiment analysis model over time.</li>
            <li>Efficient performance with minimal impact on browser resources.</li>
        </ul>
    </section>

    <section class="project-description">
        <h2>APIs and Technologies Used</h2>
        <p><strong style="color: darkorange">YouTube Data API v3</strong>: The extension uses YouTube Data API to fetch video comment threads. It allows the extension to retrieve comments in batches for processing.</p>
        <p><strong style="color: darkorange">Chrome Extensions API</strong>: This API is used to integrate the extension into the browser, leveraging background and content scripts for seamless communication with the YouTube page.</p>
        <p><strong style="color: darkorange">Machine Learning</strong>: The extension uses a trained machine learning model to analyze comment sentiments. Users can interactively adjust ratings to fine-tune the model.</p>
        <p><strong style="color: darkorange">IndexedDB</strong>: The model is persisted using IndexedDB to save user feedback and model updates across sessions.</p>
        <p><strong style="color: darkorange">MySQL Database</strong>: MySQL Database is used for storing training data and sentiments as well as user classified comments</p>
        <p><strong style="color: darkorange">Custom APIs</strong>: This extension uses custom APIs for sending user feedback to the MySQL Database</p>
        <p><strong style="color: darkorange">Web Technologies</strong>: Built using HTML, CSS, and JavaScript, leveraging asynchronous features such as fetch API for data handling.</p>
    </section>

    <section class="github-link">
        <a href="https://github.com/haydenubanx/YouTubeSentimentAnalysis">View the Project on GitHub</a>
    </section>
</div>


<script>
    const images = [
        "../../resources/images/chromeExtension.png",
        "../../resources/images/chromeExtension2.png",
        "../../resources/images/chromeExtension3.png",
        "../../resources/images/chromeExtension4.png",
        "../../resources/images/chromeExtension5.png"
    ];
    let currentIndex = 0;
    let isAnimating = false;

    function showImage(index, direction) {
        if (isAnimating) return;
        isAnimating = true;

        const carouselImage = document.getElementById('carouselImage');
        const newImage = document.createElement('img');
        newImage.src = images[index];
        newImage.classList.add('off-screen-' + (direction === 'next' ? 'right' : 'left'));
        carouselImage.parentNode.appendChild(newImage);

        // Slide out the current image and slide in the new one
        carouselImage.classList.add(direction === 'next' ? 'slide-out-left' : 'slide-out-right');
        newImage.classList.add(direction === 'next' ? 'slide-in-right' : 'slide-in-left');

        setTimeout(() => {
            carouselImage.parentNode.removeChild(carouselImage);  // Remove old image after animation
            newImage.classList.remove('slide-in-right', 'slide-in-left', 'off-screen-right', 'off-screen-left');
            newImage.classList.add('active');
            newImage.id = 'carouselImage';
            isAnimating = false;  // Allow new animations
        }, 500);  // Match animation duration
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex, 'next');
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex, 'prev');
    }
</script>

</body>
</html>