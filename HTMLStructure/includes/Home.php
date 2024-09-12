<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hayden Eubanks | Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navigation styling */
        nav {
            background-color: #333;
            padding: 1em;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
            font-size: 1.1em;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* About Section */
        .about {
            background-color: #f4f4f4;
            padding: 100px 20px;
            text-align: center;
        }

        .about h1 {
            font-size: 3em;
            margin: 0;
        }

        .about p {
            font-size: 1.2em;
            color: #666;
        }

        /* Portfolio Section */
        .portfolio {
            padding: 50px 20px;
            text-align: center;
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
<!-- Navigation Bar -->
<nav>
    <a href="#about">About</a>
    <a href="#portfolio">Portfolio</a>
    <a href="#contact">Contact</a>
</nav>

<!-- Hero Section -->
<section class="about">
    <h1>Hayden Eubanks Portolio</h1>
    <p>Hello! My name is Hayden Eubanks, and I am a Software Developer</p>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio">
    <h2>My Projects</h2>
    <div class="project-card">
        <h3>Project 1</h3>
        <p>A brief description of your project.</p>
    </div>
    <div class="project-card">
        <h3>Project 2</h3>
        <p>A brief description of your project.</p>
    </div>
    <div class="project-card">
        <h3>Project 3</h3>
        <p>A brief description of your project.</p>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact">
    <h2>Contact Me</h2>
    <p>Email: <a href="mailto:haydenubanx@gmail.com">haydenubanx@gmail.com</a></p>
    <p>Phone: +44 7950 447141</p>
</section>

<!-- Footer -->
<footer>
    <p>Updated 8 September 2024</p>
</footer>
</body>
