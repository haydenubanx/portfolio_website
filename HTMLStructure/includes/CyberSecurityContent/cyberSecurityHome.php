<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Portfolio - Hayden Eubanks</title>
    <style>
        /* General body styling */
        body {
            font-family: Roboto, sans-serif;
            margin: 0;
            height: 100%;
            box-sizing: border-box;
            background-color: #f5f5f5; /* Soft white background */
            color: #333;
            overflow-x: hidden;
        }

        /* Header Styling */
        .cyber-header {
            position: relative;
            height: 60vh;
            background-color: #102e4a; /* Almost black light blue */
            color: #f5f5f5; /* Soft white text */
            text-align: center;
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Center content horizontally */
            background-size: cover; /* Ensure background covers entire header */
            background-position: center; /* Center background */
            margin: 0; /* Remove margin */
            box-sizing: border-box;
        }

        .cyber-header h1 {
            font-size: 3.5em;
            z-index: 1;
            margin: 0;
        }

        .cyber-header p {
            font-size: 1.4em;
            margin-top: 10px;
            color: #cbd7e7; /* Lighter blue for subtext */
        }

        /* Section Styling */
        section {
            /*padding: 60px 20px;*/
            text-align: center;
        }

        .cyber-h2 {
            /*margin-top: 4em;*/
            background-size: cover;
            z-index: 2;
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
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .section-item h3 {
            z-index: 3;
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

        .wave {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave svg {
            position: relative;
            display: block;
            width: calc(148% + 1.3px);
            height: 223px;
        }

        .wave .shape-fill {
            fill: #102E4A;
        }

        /* Buttons Container styling */
        .cta-container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between buttons */
            flex-wrap: wrap;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        /* Buttons styling */
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-size: 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .cta-button i {
            margin-left: 8px;
        }

        /* PDF Container */
        .pdf-container {
            width: 90%;
            max-width: 1000px;
            height: 90vh;
            margin: 30px auto;
            background-color: white;
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Slightly larger shadow */
            border-radius: 8px; /* Rounded corners */
            padding: 20px;
        }

        embed {
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }


    </style>
</head>
<body>

<!-- Cybersecurity Header -->
<div class="cyber-header">
    <h1>Cybersecurity Portfolio</h1>
    <p>Showcasing Projects and Papers</p>
</div>
<div class="wave">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
              class="shape-fill"></path>
    </svg>
</div>

<!-- Projects Section -->
<section>
    <h2 class="cyber-h2">Cybersecurity Projects</h2>
    <div class="timeline">

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>MD5 Hash Collision Attacks</h3>
                    <p><strong>Description:</strong> The lab report discusses the vulnerabilities of the MD5 hashing
                        algorithm, specifically its susceptibility to collision attacks. The lab involves generating MD5
                        hash collisions and explores how malicious code could use the same hash as benign code to bypass
                        verification mechanisms.</p>
                    <p><strong>Uses:</strong> MD5 hashing algorithm, md5collgen function for generating collisions,
                        Python, C, Unix commands</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/MD5 Hashing Algorithm Collision Attack Lab Report.pdf"
                       download class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Security Testing Plan</h3>
                    <p><strong>Description:</strong> The document outlines a security testing plan for the Hackazon
                        application, emphasizing the importance of a structured approach to software security testing.
                        It provides methodologies for testing, including both static and dynamic tests, and highlights
                        the OWASP Application Security Verification Standard (ASVS).</p>
                    <p><strong>Uses:</strong> OWASP ASVS, Automated and manual source code review, Dynamic system
                        testing (automated and manual), Tools like Nmap and Python</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Security Testing Plan.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Identify Vulnerabilities In Mobile App</h3>
                    <p><strong>Description:</strong> This report evaluates SQL injection vulnerabilities in the Hackazon
                        application, focusing on various input fields. Multiple security flaws were identified, which
                        could enable attackers to access or modify data, with suggestions for mitigation strategies.</p>
                    <p><strong>Uses:</strong> Burp Suite (Intruder tool), Fuzz testing, HTTP proxying</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Identify Vulnerability in Mobile App.pdf"
                       download class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Fix Mobile App Vulnerabilities</h3>
                    <p><strong>Description:</strong> Discusses identifying and mitigating SQL injection vulnerabilities
                        in the Hackazon web application, emphasizing the importance of using prepared statements and
                        input filtering to enhance security.</p>
                    <p><strong>Uses:</strong> SQL/Databases, Prepared Statements, PHP, Fuzz Testing</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/MD5 Hashing Algorithm Collision Attack Lab Report.pdf"
                       download class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Fix Security Vulnerabilities</h3>
                    <p><strong>Description:</strong> The document focuses on identifying and mitigating cross-site
                        scripting (XSS) vulnerabilities in the Hackazon application. It details how XSS attacks, such as
                        reflected and stored XSS, can be exploited, and it outlines mitigation strategies like
                        input/output encoding, context-aware sanitization, and secure coding practices.</p>
                    <p><strong>Uses:</strong> PHP, HTML/JavaScript, RIPS Scanner, DOMPurify, Content Security Policy
                        (CSP)</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Fix Security Vulnerabilities.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Hash Length Extension Attacks</h3>
                    <p><strong>Description:</strong> Provides an analysis and exploration of length extension attacks on
                        cryptographic hash functions like SHA256. It explains how attackers can append data to a hashed
                        message without knowing the original contents and explores mitigating these risks through HMAC
                        implementations.</p>
                    <p><strong>Uses:</strong> SHA256, HMAC, Python, MACs (Message Authentication Codes)</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Hash Length Extension Attack Lab.pdf"
                       download class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Dynamic Security Scan</h3>
                    <p><strong>Description:</strong> Designed and implemented a secure file transfer system using
                        asymmetric encryption and digital signatures to ensure data integrity.</p>
                    <p><strong>Technologies Used:</strong> Python, OpenSSL, RSA Encryption</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Initial Dynamic Security Scan.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Static Security Scan</h3>
                    <p><strong>Description:</strong> Details the process of using Burp Suite to conduct a dynamic
                        vulnerability scan on the Hackazon application. It discusses the limitations of the free
                        version, examines Burp Suite’s ability to detect a variety of web vulnerabilities, and outlines
                        best practices for ethically reporting vulnerabilities to stakeholders.</p>
                    <p><strong>Uses:</strong> Burp Suite, HTTP/Proxy, OWASP</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Initial Static Security Scan.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Public Key Infrastructure</h3>
                    <p><strong>Description:</strong> Explores the fundamentals of Public Key Infrastructure (PKI) and
                        its role in securing network communications. The lab covers certificate creation, validation,
                        the use of secure communication protocols (like HTTPS), and simulates attack scenarios like
                        man-in-the-middle attacks to demonstrate the importance of secure PKI practices.</p>
                    <p><strong>Uses:</strong> OpenSSL, RSA Encryption, X.509 Certificates, HTTPS </p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Public Key Infrastructure Lab.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Select Test Cases</h3>
                    <p><strong>Description:</strong> Outlines the process of generating security test cases for the
                        Hackazon application based on system requirements. It includes a STRIDE threat model to identify
                        key security threats and proposes test cases to mitigate these risks across various layers of
                        the software development lifecycle (SDLC), focusing on authentication, data integrity, access
                        control, and other security features.</p>
                    <p><strong>Uses:</strong> STRIDE Threat Model, Penetration Testing, Source Code Reviews, OWASP
                        Guidelines</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Select Test Cases.pdf" download
                       class="cta-button" role="button">Download</a></article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Secret Key Encryption</h3>
                    <p><strong>Description:</strong> Explores different encryption modes and their implications on data
                        security, with a focus on the AES algorithm. The lab demonstrates how various encryption modes,
                        such as ECB, CBC, CFB, and OFB, impact data confidentiality, padding, and data corruption
                        resilience. It also emphasizes the importance of initialization vectors (IVs) and their role in
                        adding randomness to secure encryption processes.</p>
                    <p><strong>Uses:</strong> AES (Advanced Encryption Standard), Python, OpenSSL, Initialization
                        Vectors (IVs)</p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Secret Key Encryption Lab.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Acceptable Use Policy</h3>
                    <p><strong>Description:</strong> Outlines the guidelines and expectations for the proper use of H.E.
                        Games’ technological resources. It emphasizes promoting responsible usage, ensuring data
                        security, and mitigating risks associated with social engineering and human error. The policy
                        includes sections on internet usage, employee monitoring, password policies, data handling, and
                        awareness training, all aimed at protecting the company’s resources and data.</p>
                    <p><strong>Uses:</strong> ISO/IEC 27002 </p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/Acceptable Use Policy for H.E. Games LLC.pdf"
                       download class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>

        <section class="timeline-item hidden">
            <div class="">
                <article class="section-item">
                    <h3>Clean Desk Policy</h3>
                    <p><strong>Description:</strong> This document outlines a Clean Desk Policy, which establishes
                        guidelines for maintaining an organized and clutter-free workspace.</p>
                    <p><strong>Uses:</strong> ISO/IEC 27002 </p>
                    <a href="../../includes/CyberSecurityContent/SupportingFiles/CleanDeskPolicyExample.pdf" download
                       class="cta-button" role="button">Download</a>
                </article>
            </div>
        </section>
    </div>
</section>

</body>

<script defer src="../../resources/Scripts/scroll-animations.js"></script>
</html>