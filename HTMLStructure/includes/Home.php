<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hayden Eubanks | Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }

        /* Navigation styling */
        nav {
            background-color: #333;
            padding: 1em;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 1em;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: 700;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Mobile navigation dropdown */
        .nav-toggle {
            display: none;
            font-size: 1.5em;
            color: white;
            background-color: transparent;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 1em;
            top: 1em;
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
                flex-direction: column;
                background-color: #333;
                position: absolute;
                width: 100%;
                left: 0;
                top: 50px;
                padding-bottom: 10px;
            }

            nav ul.show {
                display: flex;
            }

            .nav-toggle {
                display: block;
            }
        }

        /* Hero Section */
        .about {
            padding: 100px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .about h1 {
            color: #102e4a;
            font-size: 4em;
            margin-bottom: 0.5em;
        }

        .about p {
            color: #102e4a;
            font-size: 1.5em;
        }

        .about::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('../resources/images/Portfolio_Background_Image.jpg') no-repeat center;
            background-size: cover;
            animation: zoom 20s infinite alternate;
            z-index: -1;
        }

        @keyframes zoom {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.25);
            }
        }

        /* Image styling for responsiveness */
        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        /* Portfolio Section */
        .portfolio {
            padding: 50px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .portfolio h2 {
            margin-bottom: 30px;
            font-size: 2em;
        }

        .portfolio-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1%;
        }

        .project-card {
            display: block;
            width: 30%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: inherit;
            box-sizing: border-box;
        }

        .project-card:hover {
            transform: scale(1.05);
        }

        .project-card h3 {
            margin-bottom: 10px;
            color: #102e4a;
        }

        .project-card p {
            font-size: 1em;
            color: #777;
        }

        @media (max-width: 768px) {
            .project-card {
                width: calc(100% - 2em);
                margin: 1em 0;
            }

            .about h1 {
                font-size: 2.5em;
            }

            .about p {
                font-size: 1.2em;
            }
        }
    </style>
</head>

<body>

<!-- Hero Section -->
<section class="about" aria-label="Hero Section">
    <h1>Hayden Eubanks</h1>
    <p>Aspiring<br/>Software Engineer | Quality Engineer | Cybersecurity Professional</p>
    <a href="#" class="cta-button" role="button">View My Work</a>
    <a href="https://github.com/haydenubanx/portfolio_website" class="cta-button" role="button">Go To GitHub</a>

    <h2>My Projects</h2>
    <div class="portfolio-cards">
        <a href="#" class="project-card">
            <h3>Sentiment Analysis Chrome Extension</h3>
            <p>A Chrome extension that performs sentiment analysis on a YouTube comment section to determine viewer sentiment.</p>
        </a>
        <a href="#" class="project-card">
            <h3>Generative AI Project</h3>
            <p>A brief description of your project.</p>
        </a>
        <a href="#" class="project-card">
            <h3>Cybersecurity Project</h3>
            <p>A brief description of your project.</p>
        </a>
    </div>
</section>

<script>
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('nav ul');

    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('show');
    });
</script>

</body>