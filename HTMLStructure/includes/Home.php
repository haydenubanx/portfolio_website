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
            background: url('../../HTMLStructure/resources/images/Portfolio_Background_Image.jpg') no-repeat center center/cover;
            padding: 100px 20px;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
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
            text-align: center;
            background-color: #f9f9f9;
        }

        .portfolio h2 {
            margin-bottom: 30px;
        }

        .project-card {
            display: inline-block;
            width: 30%;
            margin: 1%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; /* Ensure padding is included in the width */
        }

        @media (max-width: 768px) {
            .project-card {
                width: calc(100% - 2em); /* Full width minus margin */
                margin: 1em 0; /* Adjust margin for mobile */
            }
        }

        .project-card:hover {
            transform: scale(1.05);
        }

        .project-card h3 {
            margin-bottom: 10px;
        }

        .project-card p {
            font-size: 1em;
            color: #777;
        }

        /* Contact Section */
        .contact {
            background-color: #333;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .contact h2 {
            margin-bottom: 20px;
        }

        .contact a {
            color: #ffa500;
            text-decoration: none;
        }

        .contact a:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: white;
            font-size: 0.9em; /* Slightly smaller font for footer */
        }
        @media (max-width: 768px) {
            .project-card {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

<!-- Hero Section -->
<section class="about" aria-label="Hero Section">
    <h1>Hayden Eubanks</h1>
    <p>Aspiring<br />Software Engineer | Quality Engineer | Cybersecurity Professional</p>
    <a href="#portfolio" class="cta-button" role="button">View My Work</a>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio" aria-label="Portfolio Section">
    <h2>My Projects</h2>
    <div class="project-card" aria-labelledby="project1">
        <h3 id="project1">Sentiment Analysis Chrome Extension</h3>
        <p>A Chrome extension that performs sentiment analysis on a YouTube comment section to determine viewer sentiment.</p>
    </div>
    <div class="project-card" aria-labelledby="project2">
        <h3 id="project2">Generative AI Project</h3>
        <p>A brief description of your project.</p>
    </div>
    <div class="project-card" aria-labelledby="project3">
        <h3 id="project3">Cybersecurity Project</h3>
        <p>A brief description of your project.</p>
    </div>
</section>

</body>