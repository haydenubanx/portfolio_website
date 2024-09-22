<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Hayden Eubanks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General body styling */
        body {
            font-family: Roboto, sans-serif;
            height: 100%;
            margin: 0;
            padding: 0;
            text-align: center;
            box-sizing: border-box;
            color: #333;

        }

        .image-container {
            height: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .image-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('../../resources/images/wallpaper.jpg') no-repeat center;
            background-size: cover;
            animation: zoom 20s infinite alternate;
            z-index: -1;

        }

        /* Personal Statement Section */
        .personal-statement {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }


        .personal-statement::before {
            width: 300px;
            height: 300px;
            top: 3%;
            left: 13%;
            z-index: 0; /* Place behind content */
        }

        .personal-statement::after {
            width: 200px;
            height: 200px;
            bottom: 41%;
            right: 19%;
            z-index: 0; /* Place behind content */
        }

        .personal-statement img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
            position: relative; /* Ensure image is on top */
            z-index: 1; /* Place on top of the circles */
        }

        .personal-statement h1 {
            /*font-size: 2.5em; !* Adjust font-size for better scaling *!*/
            /*margin: 0;*/
            /*color: white;*/

            font-size: 2.5em;
            margin-bottom: 20px;
            color: white;
        }

        .personal-statement p {
            font-size: 1.2em; /* Slightly smaller font for mobile */
            color: white;
            line-height: 1.6;
            /*padding: 0 15px; !* Added padding for better text alignment *!*/
            /*color: white;*/
        }

        .text-context {
            flex: 0 0 65%; /* Text takes up 65% of the width */
            text-align: left;
            padding-left: 20px;
        }

        .personal-statement .image-wrapper {
            flex: 0 0 30%; /* Image takes up 30% of the width */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .personal-statement img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Section Styles */
        section {
            /*padding: 30px 15px; !* Adjusted padding for smaller screens *!*/
            text-align: center;
        }

        .AboutH2Heading {
            margin-bottom: 30px;
            font-size: 2em; /* Adjusted heading size for mobile */
            color: white;;
        }

        .skills-section, .section-item {
            margin-bottom: 40px;
        }

        .skills-section-break {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: white;
        }

        .section-item {
            display: block;
            width: 100%;
            max-width: 800px;
            margin: 0 auto 30px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section-item:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .section-item h3 {
            margin-bottom: 10px;
            font-size: 1.8em;
        }

        .section-item p {
            font-size: 1em;
            color: #555;
        }

        /* Skills Section */
        .skills-list {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            color: white;
        }

        .skills-list li {
            margin: 10px;
            text-align: center;
        }

        .skill-icon {
            font-size: 1.8em;
            color: white;
            margin-bottom: 5px;
        }

        /* Media Query for Mobile Devices */
        @media (max-width: 768px) {
            .personal-statement img {
                width: 120px;
                height: 120px;
            }

            .personal-statement h1 {
                font-size: 1.8em;
            }

            .personal-statement p {
                font-size: 1em;
                padding: 0 10px;
            }

            .AboutH2Heading {
                font-size: 1.5em;
            }

            .section-item {
                padding: 15px;
            }

            .skills-list {
                flex-direction: column;
            }

            .timeline-item-icon {
                font-size: 2em;
            }

            .personal-statement::before, .personal-statement::after {
                display: none; /* Hide the decorative circles for better spacing */
            }
        }


        /* Media Query for Mobile Devices */
        @media (max-width: 768px) {
            .personal-statement img {
                width: 120px;
                height: 120px;
            }

            .personal-statement h1 {
                font-size: 1.8em;
            }

            .personal-statement p {
                font-size: 1em;
                padding: 0 10px;
            }

            .AboutH2Heading {
                font-size: 1.5em;
            }


            .skills-list {
                flex-direction: column;
            }

        }

        .heading {
            color: white;
        }

        .hidden {
            opacity: 0;
            filter: blur(0.2rem);
            transform: translateX(-2%);
            transition: all 0.5s;
        }

        .show {
            opacity: 1;
            filter: blur(0);
            transform: translateX(0%);
        }

        @media(prefers-reduced-motion) {
            .hidden {
                transition: none;
            }
        }
    </style>
</head>
<body>

<div class="image-container">

    <section class="personal-section">
    <div class="personal-statement">
        <!-- Image Section -->
        <div class="image-wrapper">
        <img src="../../resources/images/Hayden_Polaroid.jpeg" alt="Hayden Eubanks">
        </div>
        <div class="text-context">
        <h1 class="heading">About Me</h1>
        <p>Hello! I'm Hayden, an aspiring software developer passionate about building efficient, user-friendly
            applications. With a background in computer science and professional experience as a quality engineer, I am
            dedicated to crafting clean, scalable code and continuously improving my skills. I'm eager to contribute to
            innovative teams and develop cutting-edge technology solutions.</p>
        </div>
    </div>
    </section>

    <!-- Skills Section -->
    <section class="skills hidden">
        <!-- Programming Languages -->
        <div class="skills-section">
            <h3 class="skills-section-break">Programming Languages</h3>
            <ul class="skills-list">
                <li>
                    <i class="fab fa-java skill-icon"></i>
                    <strong>Java</strong>
                </li>
                <li>
                    <i class="fas fa-code skill-icon"></i>
                    <strong>C++</strong>
                </li>
                <li>
                    <i class="fab fa-php skill-icon"></i>
                    <strong>PHP</strong>
                </li>
                <li>
                    <i class="fab fa-js skill-icon"></i>
                    <strong>JavaScript</strong>
                </li>
                <li>
                    <i class="fab fa-python skill-icon"></i>
                    <strong>Python</strong>
                </li>
                <li>
                    <i class="fas fa-database skill-icon"></i>
                    <strong>SQL</strong>
                </li>
                <li>
                    <i class="fas fa-magic skill-icon"></i>
                    <strong>Groovy</strong>
                </li>
            </ul>
        </div>

        <!-- Frameworks -->
        <div class="skills-section">
            <h3 class="skills-section-break">Frameworks</h3>
            <ul class="skills-list">
                <li>
                    <i class="fas fa-cloud skill-icon"></i>
                    <strong>RestAssured</strong>
                </li>
                <li>
                    <i class="fas fa-leaf skill-icon"></i>
                    <strong>SpringBoot</strong>
                </li>
                <li>
                    <i class="fas fa-seedling skill-icon"></i>
                    <strong>Cucumber</strong>
                </li>
                <li>
                    <i class="fas fa-vial skill-icon"></i>
                    <strong>JUnit</strong>
                </li>
                <li>
                    <i class="fas fa-robot skill-icon"></i>
                    <strong>Selenium</strong>
                </li>
                <li>
                    <i class="fas fa-shield-alt skill-icon"></i>
                    <strong>OWASP</strong>
                </li>
            </ul>
        </div>

        <!-- Tools -->
        <div class="skills-section">
            <h3 class="skills-section-break">Tools</h3>
            <ul class="skills-list">
                <li>
                    <i class="fab fa-git-alt skill-icon"></i>
                    <strong>Git</strong>
                </li>
                <li>
                    <i class="fas fa-server skill-icon"></i>
                    <strong>Linux</strong>
                </li>
                <li>
                    <i class="fab fa-docker skill-icon"></i>
                    <strong>Docker</strong>
                </li>
                <li>
                    <i class="fab fa-jenkins skill-icon"></i>
                    <strong>Jenkins</strong>
                </li>
                <li>
                    <i class="fas fa-terminal skill-icon"></i>
                    <strong>Splunk</strong>
                </li>
                <li>
                    <i class="fas fa-chart-line skill-icon"></i>
                    <strong>Dynatrace</strong>
                </li>
                <li>
                    <i class="fas fa-server skill-icon"></i>
                    <strong>Postman</strong>
                </li>
                <li>
                    <i class="fas fa-thunderstorm skill-icon"></i>
                    <strong>Thunder Client</strong>
                </li>
                <li>
                    <i class="fas fa-stream skill-icon"></i>
                    <strong>Kafka</strong>
                </li>
                <li>
                    <i class="fas fa-file-alt skill-icon"></i>
                    <strong>Swagger</strong>
                </li>
                <li>
                    <i class="fas fa-code-branch skill-icon"></i>
                    <strong>Visual Studio</strong>
                </li>
                <li>
                    <i class="fas fa-code skill-icon"></i>
                    <strong>Visual Studio Code</strong>
                </li>
                <li>
                    <i class="fas fa-laptop-code skill-icon"></i>
                    <strong>JetBrains IDEs</strong>
                </li>
                <li>
                    <i class="fas fa-shield-alt skill-icon"></i>
                    <strong>BurpSuite</strong>
                </li>
                <li>
                    <i class="fas fa-network-wired skill-icon"></i>
                    <strong>Wireshark</strong>
                </li>
            </ul>
        </div>
    </section>

    <!-- Job Experience Section -->
    <section class="job-experience-section hidden">
        <h2 class="AboutH2Heading">Job Experience</h2>
        <div class="timeline">
            <div class="timeline-item">
                <!--            <i class="fa-solid fa-building-columns timeline-item-icon"></i>-->
                <article class="section-item">
                    <h3>Quality Engineer - Lloyds Banking Group</h3>
                    <p><strong>Duration:</strong> October 2023 - Present</p>
                    <p>Responsibilities include ensuring the quality and efficiency of banking software solutions
                        through rigorous testing and quality control processes, using automated and manual testing
                        methods.</p>
                    <p><strong>Accomplishments:</strong></p>
                    <ul>
                        <li>Refactored automation repo to reduce runtime by 70%, reducing test execution time from 50
                            minutes to 15 minutes.
                        </li>
                        <li>Developed a new BDD test automation repo for regression testing across three
                            microservices.
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section class="education-section hidden">
        <h2 class="AboutH2Heading">Education</h2>
        <div class="timeline">
            <div class="timeline-item empty">
            </div>
            <div class="timeline-item">
                <!--            <i class="fas fa-graduation-cap timeline-item-icon"></i>-->
                <article class="section-item">
                    <h3>Bachelor's Degree in Computer Science: Cybersecurity</h3>
                    <p><strong>University:</strong> Liberty University</p>
                    <p><strong>Graduation Year:</strong> 2023</p>
                    <p><strong>GPA:</strong> 3.79</p>
                    <p>U.S. Equivalent of a First-Class Degree</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="certifications-section hidden">
        <h2 class="AboutH2Heading">Certifications</h2>
        <div class="timeline">
            <div class="timeline-item">
                <!--            <i class="fas fa-solid fa-copy timeline-item-icon"></i>-->
                <article class="section-item">
                    <h3>ISTQB Certified Tester</h3>
                    <p>Foundation Level</p>
                    <p><strong>Certificate Obtained:</strong> November 2, 2023</p>
                </article>
            </div>
        </div>
    </section>

</div>

</body>


<script defer src="../../resources/Scripts/scroll-animations.js"></script>
</html>