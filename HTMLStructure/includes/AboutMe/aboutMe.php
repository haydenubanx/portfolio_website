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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }

        /* Personal Statement Section */
        .personal-statement {
            position: relative;
            background: linear-gradient(to right, #f4f4f4, #e0e0e0);
            padding: 80px 20px;
            text-align: center;
            overflow: hidden; /* Ensure circles don’t overflow the section */
        }

        .personal-statement::before,
        .personal-statement::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background-color: #ffa500;
            opacity: 0.8; /* Adjust for subtlety */
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
            width: 300px;
            height: 300px;
            object-fit: cover;
            margin-bottom: 20px;
            position: relative; /* Ensure image is on top */
            z-index: 1; /* Place on top of the circles */
        }

        .personal-statement h1 {
            font-size: 3.5em;
            margin: 0;
        }

        .personal-statement p {
            font-size: 1.4em;
            color: #666;
        }

        /* Section Styles */
        section {
            padding: 40px 20px;
            text-align: center;
        }

        .AboutH2Heading {
            margin-bottom: 40px;
            font-size: 2.5em;
            color: #222;
        }

        .skills-section, .section-item {
            margin-bottom: 60px;
        }

        .skills-section-break {
            font-size: 2em;
            margin-bottom: 20px;
            color: #222;
        }

        .section-item {
            display: block;
            width: 100%;
            max-width: 800px;
            margin: 0 auto 40px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .section-item h3 {
            margin-bottom: 10px;
            font-size: 2em;
        }

        .section-item p {
            font-size: 1.1em;
            color: #555;
        }

        /* Skills Section */
        .skills-list {
            list-style-type: none;
            /*padding-bottom: 100px;*/
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .skills-list li {
            margin: 20px;
            text-align: center;
        }

        .skill-icon {
            font-size: 3em;
            color: #666;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .skills-list {
                flex-direction: column;
                align-items: center;
            }

            .skills-list li {
                margin-bottom: 30px;
            }

            .section-item {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        /* Timeline Styles */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #ddd;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 20px;
            border-radius: 8px;
            position: relative;
            width: 45%;
            margin: 10px 0;
            /* Adjusting the timeline item position */
            transform: translateX(-50%);
        }

        .timeline-item:nth-child(odd) {
            left: -1%;
            transform: translateX(0);
        }

        .timeline-item:nth-child(even) {
            left: 25%;
            transform: translateX(50%);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: #ffa500;
            border-radius: 50%;
        }

        .timeline-item:nth-child(odd)::before {
            top: 35px;
            left: auto;
            right: -6px;
        }

        .timeline-item:nth-child(even)::before {
            top: 35px;
            left: 30px;
        }

        /* Icon Styles */
        .timeline-item-icon {
            width: 500px;
            height: 500px;
            font-size: 300px;
            color: #007bff;
            position: absolute;
            margin-top: 5%;
        }

        .timeline-item:nth-child(odd) .timeline-item-icon {
            right: -140px;
            transform: translateX(100%);
        }

        .timeline-item:nth-child(even) .timeline-item-icon {
            left: -140px;
            transform: translateX(-100%);
        }

        /* Hide the dot for empty timeline items */
        .timeline-item.empty::before {
            display: none;
        }

        .company-logo {
            width: 150px; /* Adjust as needed */
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="personal-statement">
    <!-- Image Section -->
    <img src="../../HTMLStructure/resources/images/Hayden_Polaroid.jpeg" alt="Hayden Eubanks">
    <h1>About Me</h1>
    <p>Hello! I'm Hayden, an aspiring software developer passionate about building efficient, user-friendly
        applications. With a background in computer science and professional experience as a quality engineer, I am
        dedicated to crafting clean, scalable code and continuously improving my skills. I'm eager to contribute to
        innovative teams and develop cutting-edge technology solutions.</p>
</div>

<!-- Skills Section -->
<section class="skills">
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
<section>
    <h2 class="AboutH2Heading">Job Experience</h2>
    <div class="timeline">
        <div class="timeline-item">
            <i class="fa-solid fa-building-columns timeline-item-icon"></i>
            <article class="section-item">
                <h3>Quality Engineer - Lloyds Banking Group</h3>
                <p><strong>Duration:</strong> October 2023 - Present</p>
                <p>Responsibilities include ensuring the quality and efficiency of banking software solutions through rigorous testing and quality control processes, using automated and manual testing methods.</p>
                <p><strong>Accomplishments:</strong></p>
                <ul>
                    <li>Refactored automation repo to reduce runtime by 70%, reducing test execution time from 50 minutes to 15 minutes.</li>
                    <li>Developed a new BDD test automation repo for regression testing across three microservices.</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- Education Section -->
<section>
    <h2 class="AboutH2Heading">Education</h2>
    <div class="timeline">
        <div class="timeline-item empty">
        </div>
        <div class="timeline-item">
            <i class="fas fa-graduation-cap timeline-item-icon"></i>
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
<section>
    <h2 class="AboutH2Heading">Certifications</h2>
    <div class="timeline">
        <div class="timeline-item">
            <i class="fas fa-solid fa-copy timeline-item-icon"></i>
            <article class="section-item">
                <h3>ISTQB Certified Tester</h3>
                <p>Foundation Level</p>
                <p><strong>Certificate Obtained:</strong> November 2, 2023</p>
            </article>
        </div>
    </div>
</section>

</body>
</html>