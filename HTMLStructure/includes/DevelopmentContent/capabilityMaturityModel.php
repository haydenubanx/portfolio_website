<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Desk Policy - Hayden Eubanks</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General body styling */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f6f9; /* Light background color */
            color: #333;
            line-height: 1.6;
        }

        /* Personal Statement Section */
        .intro-section {
            background: linear-gradient(to right, #1e2a33, #3a3e44);
            padding: 80px 20px;
            text-align: center;
            color: white;
        }

        .intro-section h1 {
            font-size: 3em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .intro-section p {
            font-size: 1.2em;
            max-width: 900px;
            margin: 20px auto;
            color: #dcdcdc;
        }

        .skill-icon {
            font-size: 7em;
            color: #ff9500;
            margin-bottom: 20px;
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

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #1e2a33;
            color: white;
        }

        footer p {
            font-size: 0.9em;
            color: #ccc;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .intro-section h1 {
                font-size: 2.5em;
            }

            .intro-section p {
                font-size: 1.1em;
            }

            .skill-icon {
                font-size: 5em;
            }

            .cta-button {
                width: 100%;
                padding: 12px 0;
            }

            .pdf-container {
                width: 95%;
                height: 80vh;
            }
        }
    </style>
    <script>
        // Function to toggle the PDF visibility and switch caret icon
        function togglePDF() {
            const pdfContainer = document.querySelector('.pdf-container');
            const readButton = document.querySelector('.cta-button.read-browser');
            const caretIcon = readButton.querySelector('i');

            // Toggle visibility of the PDF container
            if (pdfContainer.style.display === 'none' || pdfContainer.style.display === '') {
                pdfContainer.style.display = 'flex'; // Show the PDF
                caretIcon.classList.remove('fa-caret-down');
                caretIcon.classList.add('fa-caret-up'); // Change caret to up
            } else {
                pdfContainer.style.display = 'none'; // Hide the PDF
                caretIcon.classList.remove('fa-caret-up');
                caretIcon.classList.add('fa-caret-down'); // Change caret to down
            }
        }
    </script>
</head>
<body>

<div class="intro-section">
    <i class="fas fa-file-alt skill-icon"></i>
    <h1>Capability Maturity Model</h1>
    <p>
...    </p>
    <p>
...    </p>
</div>

<!-- Buttons Container to center buttons -->
<div class="cta-container">
    <a href="includes/CyberSecurityContent/SupportingFiles/Capability Maturity Model (CMM) Assignment.pdf" download class="cta-button" role="button">Download Clean Desk Policy</a>
    <a class="cta-button read-browser" onclick="togglePDF()">Read In Browser <i class="fa fa-caret-down"></i></a>
</div>

<!-- PDF Embed Section, initially hidden -->
<div class="pdf-container">
    <embed src="includes/CyberSecurityContent/SupportingFiles/Capability Maturity Model (CMM) Assignment.pdf" type="application/pdf" />
</div>


<!-- FontAwesome Kit -->
<script src="https://kit.fontawesome.com/d6bcb154dc.js" crossorigin="anonymous"></script>
</body>
</html>