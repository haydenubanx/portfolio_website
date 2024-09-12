<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - [Your Name]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Personal Statement Section */
        .personal-statement {
            background-color: #f4f4f4;
            padding: 60px 20px;
            text-align: center;
        }

        .personal-statement img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .personal-statement h1 {
            font-size: 3em;
            margin: 0;
        }

        .personal-statement p {
            font-size: 1.2em;
            color: #666;
        }

        /* Experience, Education, Skills Sections */
        .section {
            padding: 50px 20px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 30px;
        }

        .section-item {
            display: inline-block;
            width: 30%;
            margin: 1%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
            background-color: white;
        }

        .section-item:hover {
            transform: scale(1.05);
        }

        .section-item h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .section-item p {
            font-size: 1em;
            color: #777;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: white;
        }

        @media (max-width: 768px) {
            .section-item {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<div class="personal-statement">
    <!-- Image Section -->
    <img src="../../HTMLStructure/resources/images/Hayden_Polaroid.jpeg" alt="Hayden Eubanks">
    <h1>About Me</h1>
    <p>Hello! I'm Hayden, an aspiring software developer passionate about building efficient, user-friendly applications. With a background in computer science and professional experience as a quality engineer, I am dedicated to crafting clean, scalable code and continuously improving my skills. I'm eager to contribute to innovative teams and develop cutting-edge technology solutions.</p>
</div>

<!-- Job Experience Section -->
<div class="section">
    <h2>Job Experience</h2>
    <div class="section-item">
        <h3>Quality Engineer - Lloyds Banking Group</h3>
        <p><strong>Duration:</strong> October 2023 - Present</p>
        <p>Responsibilities include ensuring the quality and efficiency of banking software solutions through rigorous testing and quality control processes, using automated and manual testing methods.</p>
        <p><strong>Accomplishments:</strong>
        <ul>
            <li><p>Refactored existing automation repo to reduce runtime by 70%, going from 50 minutes to approximately 15 minutes</p></li>
            <li><p>Built new BDD test automation repo from scratch that served as a regression pack for three microservices</p></li>
        </ul>
        </p>
    </div>
</div>

<!-- Education Section -->
<div class="section">
    <h2>Education</h2>
    <div class="section-item">
        <h3>Bachelor's Degree in Computer Science: Cybersecurity</h3>
        <p><strong>University:</strong> Liberty University</p>
        <p><strong>Graduation Year:</strong> 2015</p>
        <p><strong>GPA:</strong> 3.79</p>
    </div>
</div>

<!-- Skills Section -->
<div class="section">
    <h2>Skills</h2>
    <div class="section-item">
        <ul>
            <li><strong>Programming Languages:</strong> Java, C++, PHP, JavaScript, Python, SQL</li>
            <li><strong>Frameworks:</strong> RestAssured, SpringBoot, Cucumber</li>
            <li><strong>Tools:</strong> Git, Docker, Jenkins, Splunk, Dynatrace, Postman, Thunder client, Confluent Kafka</li>
            <li><strong>Testing:</strong> Automated and Manual Testing</li>
        </ul>
    </div>
</div>

</body>
</html>