<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Portfolio - Hayden Eubanks</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5; /* Soft white background */
            color: #333;
        }

        /* Header Styling */
        .cyber-header {
            background-color: #102e4a; /* Almost black light blue */
            color: #f5f5f5; /* Soft white text */
            text-align: center;
            padding: 60px 20px;
        }

        .cyber-header h1 {
            font-size: 3.5em;
            margin: 0;
        }

        .cyber-header p {
            font-size: 1.4em;
            margin-top: 10px;
            color: #cbd7e7; /* Lighter blue for subtext */
        }

        /* Section Styling */
        section {
            padding: 60px 20px;
            text-align: center;
        }

        .cyber-h2 {
            margin-bottom: 40px;
            font-size: 2.5em;
            color: #102e4a;
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


        .project-link {
            font-size: 1.1em;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .project-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Cybersecurity Header -->
<div class="cyber-header">
    <h1>Cybersecurity Portfolio</h1>
    <p>Showcasing Projects and Papers</p>
</div>

<!-- Projects Section -->
<section>
    <h2 class="cyber-h2">Cybersecurity Projects</h2>
    <div class="timeline">
        <div class="timeline-item">
            <article class="section-item">
                <h3>Network Penetration Testing Tool</h3>
                <p><strong>Description:</strong> Developed a tool to automate network penetration tests using Python and Scapy, identifying potential vulnerabilities and generating reports.</p>
                <p><strong>Technologies Used:</strong> Python, Scapy, Nmap</p>
                <a href="#" class="project-link">View Project</a>
            </article>
        </div>

        <div class="timeline-item">
            <article class="section-item">
                <h3>Secure File Transfer System</h3>
                <p><strong>Description:</strong> Designed and implemented a secure file transfer system using asymmetric encryption and digital signatures to ensure data integrity.</p>
                <p><strong>Technologies Used:</strong> Python, OpenSSL, RSA Encryption</p>
                <a href="#" class="project-link">View Project</a>
            </article>
        </div>

        <div class="timeline-item">
            <article class="section-item">
                <h3>Clean Desk Policy</h3>
                <p><strong>Description:</strong> Built a real-time dashboard for tracking system vulnerabilities and monitoring security patch deployment.</p>
                <p><strong>Technologies Used:</strong> React, OWASP ZAP, Node.js</p>
                <a href="#" class="project-link">View Project</a>
            </article>
        </div>
    </div>
</section>

<!-- Research Papers Section -->
<section>
    <h2 class="cyber-h2">Research Papers</h2>
    <div class="timeline">
        <div class="timeline-item">
            <article class="section-item">
                <h3>Exploring Zero-Day Exploits in IoT Devices</h3>
                <p><strong>Abstract:</strong> This paper examines the vulnerabilities in IoT devices, focusing on zero-day exploits and mitigation techniques.</p>
                <a href="#" class="project-link">Read Paper</a>
            </article>
        </div>

        <div class="timeline-item">
            <article class="section-item">
                <h3>Blockchain for Enhancing Cybersecurity in Financial Transactions</h3>
                <p><strong>Abstract:</strong> Investigates how blockchain can be used to improve the security and transparency of financial transactions, preventing fraud and tampering.</p>
                <a href="#" class="project-link">Read Paper</a>
            </article>
        </div>

        <div class="timeline-item">
            <article class="section-item">
                <h3>Threat Detection in Cloud Infrastructures Using Machine Learning</h3>
                <p><strong>Abstract:</strong> A research paper exploring how machine learning algorithms can detect and predict cyber threats in cloud environments.</p>
                <a href="#" class="project-link">Read Paper</a>
            </article>
        </div>
    </div>
</section>

</body>
</html>