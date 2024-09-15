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
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: 700;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Hero Section */
        .about {
            padding: 100px 20px;
            text-align: center;
            color: white;
            /*text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);*/
            position: relative;
            overflow: hidden; /* Hide overflow to ensure image doesn’t extend outside the section */
            color: black;
        }

        .about::before {
            content: "";
            background: url('../../HTMLStructure/resources/images/Portfolio_Background_Image.jpg') no-repeat center center/cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /*background: inherit; !* Inherit background image from parent *!*/
            background-size: cover;
            background-position: center;
            animation: zoom 20s infinite alternate; /* Apply animation */
            z-index: -1; /* Place behind text */
        }

        @keyframes zoom {
            0% {
                transform: scale(1); /* Initial scale */
            }
            100% {
                transform: scale(1.25); /* Scale up to 105% */
            }
        }

        .about h1 {
            font-size: 4em;
            margin-bottom: 0.5em;
        }

        .about p {
            font-size: 1.5em;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffa500;
            color: #fff;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
        }

        .cta-button:focus, .cta-button:hover {
            background-color: #ff8500;
            outline: none; /* Remove default outline for custom focus */
            transform: scale(1.05); /* Slight scale on hover for better interaction */
        }

        /* Portfolio Section */
        .portfolio {
            padding: 50px 20px;
            background-color: #f9f9f9;
            text-align: center; /* Center text for the heading */
        }

        .portfolio h2 {
            margin-bottom: 30px;
            font-size: 2em; /* Adjust font size if needed */
        }

        /* Flex container for the project cards */
        .portfolio-cards {
            display: flex;
            flex-wrap: wrap; /* Allows wrapping to new lines if needed */
            justify-content: center; /* Center the cards horizontally */
            gap: 1%; /* Add space between cards */
        }

        .project-card {
            display: block; /* Ensure the whole card is clickable */
            width: 30%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none; /* Remove underline from link */
            color: inherit; /* Inherit text color */
            box-sizing: border-box; /* Ensure padding is included in the width */
        }

        .project-card:hover {
            transform: scale(1.05);
        }

        .project-card h3 {
            margin-bottom: 10px;
            color: black;
            text-shadow: none;
        }

        .project-card p {
            font-size: 1em;
            color: #777;
            text-shadow: none;
        }

        @media (max-width: 768px) {
            .project-card {
                width: calc(100% - 2em); /* Full width minus margin */
                margin: 1em 0; /* Adjust margin for mobile */
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
            <p>A Chrome extension that performs sentiment analysis on a YouTube comment section to determine viewer
                sentiment.</p>
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

</body>