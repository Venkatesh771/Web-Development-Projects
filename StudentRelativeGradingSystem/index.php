<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="medal.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Niconne&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');

        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: black;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 10px 20px;
        }

        .navbar-brand img {
            max-height: 30px;
            margin-left: 15px;
        }

        .navbar-nav .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link i {
            margin-right: 8px;
        }

        .hero-container {
            display: flex;
            height: 85vh;
            padding: 20px;
        }

        .hero-image {
            flex: 1;
            background: url('AssetsH/4.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 10px;
            margin: 10px;
        }

        .hero-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .hero-content .header-title {
            font-size: 28px;
            color: #000000;
            font-family: "Catamaran", sans-serif;
            font-weight: 500;
        }

        .hero-content .header-title p {
            margin-top: 5px;
            font-family: "Niconne", cursive;
            font-size: 28px;
            color: #097969;
        }

        .hero-content .header-buttons a {
            font-size: 15px;
            margin: 5px;
            padding: 8px 15px;
            background-color: #097969;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .hero-content .header-buttons a i {
            margin-right: 8px;
        }

        .hero-content .header-buttons a:hover {
            background-color: #065a4a;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 40px;
        }

        h1 {
            text-align: center;
            padding-bottom: 20px;
            color: #333;
            font-family: "Catamaran", sans-serif;
            font-size: 28px;
        }

        .section2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 20px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
            margin-bottom: 20px;
        }

        .section2 .text {
            flex: 1;
            margin-right: 30px;
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            max-width: 500px;
            font-family: "Mukta", sans-serif;
            font-weight: 600;
        }

        .section2 .image {
            flex: 1;
            text-align: right;
        }

        .section2 .image img {
            max-width: 100%;
            border-radius: 20px;
        }

        .Quotes {
            font-size: 18px;
            color: red;
        }

        #Gap {
            margin-top: 40px;
        }

        #GapText {
            margin-right: 0;
            margin-left: 25px;
        }

        /* Section-3 */
        .section3 {
            max-width: 1200px;
            margin: 0 40px;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
        }

        .section3 h2 {
            text-align: center;
            color: #000000;
            font-family: "Catamaran", sans-serif;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .table {
            width: 100%;
            max-width: 100%;
            background-color: transparent;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table th,
        .table td {
            width: 50%;
            padding: 12px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-family: "Mukta", sans-serif;
            text-align: center;
        }

        .table th {
            background-color: #097969;
            font-weight: bold;
            color: #ffffff;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        #WhiteBdr {
            border-left: 1.5px solid #555;
        }

        #RightBorder {
            border-right: 1.5px solid #555;
            border-left: 1.5px solid #555;
        }

        /* Section-4 */
        .section4 {
            max-width: 1200px;
            margin: 35px 40px;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
            font-family: "Mukta", sans-serif;
        }

        .section4 h2 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .bullet-points {
            list-style-type: disc;
            margin: 20px;
            padding: 0;
            font-size: 1rem;
            color: #555;
            width: 50%;
            font-weight: 500;
        }

        .bullet-points li {
            margin-bottom: 15px;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .image-container img {
            max-width: 100%;
            height: 300px;
        }

        /* Section-5 */
        .statics-section {
            max-width: 1200px;
            margin: 35px 40px;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
            font-family: "Mukta", sans-serif;
        }

        .statics-section h2 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .statics-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }

        .statics-info {
            flex: 1;
        }

        .statistic-item {
            margin-bottom: 25px;
            background: #ffffff;
            padding: 15px;
            border-radius: 25px;
        }

        .statistic-item h3 {
            font-size: 1.25rem;
            color: #444;
            margin-bottom: 10px;
        }

        .statistic-item p {
            margin: 0;
            font-size: 1rem;
            color: #333;
            font-weight: 500;
        }

        .statistic-item p strong {
            color: #C21E56;
        }

        .statistic-item span {
            font-size: 1rem;
            color: #333;
        }

        .statics-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .statics-image img {
            max-width: 100%;
            height: auto;
            margin: 150px 0;
            border-radius: 30px;
        }

        /* Section-6 */
        .grading-section {
            max-width: 1200px;
            margin: 35px 40px;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
            font-family: "Mukta", sans-serif;
        }

        .grading-heading {
            text-align: center;
            margin-bottom: 20px;
        }

        .grading-table {
            width: 80%;
            margin: 0 auto 20px auto;
            border-collapse: collapse;
        }

        .grading-table th,
        .grading-table td {
            border: 1px solid #000;
            padding: 12px 15px;
            text-align: center;
        }

        .grading-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .grading-table tr:nth-child(odd) {
            background-color: #e0e0e0;
        }

        .grading-table tr:hover {
            background-color: #000;
            color: #ffffff;
        }

        .grading-table th {
            background-color: #097969;
            color: #ffffff;
        }

        .grading-table caption {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .Bla {
            background-color: #000;
            color: #ffffff;
        }

        .caption {
            font-family: "Satisfy", cursive;
            color: #333;
            margin-left: 5px;
        }

        /* Section-7 */
        .Section7 {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 35px 40px;
            background: #e0e0e0;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
            font-family: "Mukta", sans-serif;
        }

        .card {
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .card img {
            width: 80%;
            height: 180px;
            object-fit: cover;
            margin: 10px auto;
        }

        .card h3 {
            margin: 15px 0;
            font-size: 1.2em;
            color: #333;
        }

        .card p {
            padding: 0 15px 15px;
            font-size: 0.9em;
            color: #555;
        }

        footer {
            background-color: #000;
            padding: 20px;
            border-top: 1px solid #ddd;
            text-align: start;
        }

        .footer-content {
            max-width: 30%;
            margin: 0 40px;
        }

        .footer-logo img {
            height: 30px;
            margin-bottom: 10px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #fff;
            font-size: 14px;
        }

        .footer-links a:hover {
            color: #097969;
        }

        footer h3 {
            color: #fff;
            font-size: 16px;
            text-align: center;
            font-family: "Satisfy", cursive;
            margin-top: 20px;
        }

        /* Media-Quries */
        @media only screen and (max-width: 600px) {
            .navbar {
                padding: 5px 10px;
            }

            .navbar-brand img {
                max-height: 28px;
                margin-left: 5px;
            }

            .navbar-nav .nav-link {
                font-size: 14px;
            }

            .hero-container {
                flex-direction: column;
                height: auto;
                padding: 15px;
            }

            .hero-image {
                width: 100%;
                margin: 0;
                margin-bottom: 10px;
                height: 200px;
            }


            .hero-content {
                padding: 10px;
            }

            .hero-content .header-title {
                font-size: 22px;
            }

            .hero-content .header-title p {
                font-size: 22px;
            }

            .hero-content .header-buttons a {
                font-size: 14px;
                padding: 6px 10px;
            }

            .container {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .section2 {
                flex-direction: column;
                padding: 10px;
            }

            .section2 .text {
                margin-right: 0;
                margin-bottom: 10px;
                font-size: 14px;
            }

            .section2 .image img {
                max-width: 100%;
                height: auto;
            }

            .section3 {
                margin: 30px 10px;
                padding: 20px 10px;
            }

            .section3 h2 {
                font-size: 20px;
            }

            .table th,
            .table td {
                font-size: 14px;
            }

            .section4,
            .statics-section,
            .grading-section {
                margin: 30px 10px;
                padding: 20px 30px;
            }

            .section4 h2,
            .statics-section h2,
            .grading-heading {
                font-size: 25px;
            }

            .content,
            .statics-content {
                flex-direction: column;
                align-items: center;
            }

            .statics-image img {
                margin: 0 auto;
            }

            .statistic-item {
                width: 100%;
                margin: 20px auto;
                padding: 20px;
            }

            .bullet-points,
            .statics-info {
                width: 100%;
                font-size: 14px;
            }

            .bullet-points li,
            .statistic-item h3,
            .statistic-item p {
                font-size: 14px;
            }

            .image-container,
            .statics-image {
                width: 100%;
                margin-top: 10px;
            }

            .image-container img,
            .statics-image img {
                height: auto;
            }

            .grading-table {
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .grading-table,
            .grading-table th,
            .grading-table td {
                font-size: 14px;
            }

            .Section7 {
                width: 95%;
                flex-direction: column;
                align-items: center;
                padding: 20px;
                margin: 20px auto;
            }

            .card {
                width: 100%;
                box-shadow: none;
            }

            .card img {
                height: auto;
            }

            footer {
                padding: 10px;
                text-align: center;
            }

            .footer-content {
                max-width: 100%;
                margin: 0;
            }

            .footer-links a {
                font-size: 15px;
            }

            footer h3 {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="AssetsH/Logo2.png" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fas fa-user-lock"></i> Admin Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_resultspage.php">
                        <i class="fas fa-clipboard-check"></i> View Results
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Hero Section -->
    <div class="hero-container" id="Home">
        <div class="hero-image"></div>
        <div class="hero-content">
            <div class="header-title">
                Online Student Relative Grading System
                <p>Efficient, Easy, Accurate, and Reliable.</p>
            </div>
            <div class="header-buttons">
                <a href="view_resultspage.php">
                    <i class="fas fa-clipboard-check"></i> View Results
                </a>
            </div>
        </div>
    </div>
    <div class="container" id="Relative Grading System">
        <h1>Relative Grading System</h1>
        <div class="section2">
            <div class="text">
                <span class="Quotes">" </span>The relative grading system evaluates students by comparing their performance to classmates, assigning grades based on the overall score distribution, often using a bell curve to adjust for variations in exam difficulty and class performance.<span class="Quotes">"</span>
            </div>
            <div class="image">
                <img src="AssetsH/2.jpg" alt="Description of the image">
            </div>
        </div>
        <div class="section2" id="Gap">
            <div class="image">
                <img src="AssetsH/3.jpg" alt="Description of the image">
            </div>
            <div class="text" id="GapText">
                <span class="Quotes">" </span>This method ensures a fair assessment of students by considering the collective performance, promoting a more balanced and comparative grading approach.<span class="Quotes">"</span>
            </div>
        </div>
    </div>

    <div class="section3" id="Absolute Grading System VS Relative Grading System">
        <h2>Absolute Grading System VS Relative Grading System</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Absolute Grading System</th>
                    <th>Relative Grading System</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Grades are based on fixed criteria and benchmarks.</td>
                    <td>Grades are based on the distribution of scores within the class.</td>
                </tr>
                <tr id="WhiteBdr">
                    <td>Students are evaluated independently of their peers.</td>
                    <td id="RightBorder">Students are evaluated in comparison to their peers.</td>
                </tr>
                <tr>
                    <td>Grade thresholds are set in advance and remain stable.</td>
                    <td>Grade thresholds may adjust based on the overall performance of the class.</td>
                </tr>
                <tr id="WhiteBdr">
                    <td>Often used in standardized testing environments.</td>
                    <td id="RightBorder">Common in competitive academic environments.</td>
                </tr>
                <tr>
                    <td>Encourages deep understanding of defined material.</td>
                    <td>Encourages differentiation according to collective class results.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section4" id="BellCurve">
        <h2>Bell Curve</h2>
        <div class="content">
            <ul class="bullet-points">
                <li>The bell curve grading system evaluates students relative to each other, assigning grades based on a normal distribution.</li>
                <li>It maintains grade consistency across different classes and cohorts.</li>
                <li>This method may foster competition and anxiety among students.</li>
                <li>High-performing students in a strong cohort may sometimes be disadvantaged.</li>
                <li>Lower-performing students might feel demotivated, believing their efforts won't significantly improve their standing.</li>
            </ul>
            <div class="image-container">
                <img src="AssetsH/curve.png" alt="Bell Curve Image">
            </div>
        </div>
    </div>

    <div class="statics-section" id="StaticsMeasure">
        <h2>Statics Measure</h2>
        <div class="statics-content">
            <div class="statics-info">
                <div class="statistic-item">
                    <h3>1. Mean (Average)</h3>
                    <p><strong>Formula:</strong> Mean = <span>&#931;x<sub>i</sub> / N</span></p>
                    <p><strong>Description:</strong> Add up all the students' scores and divide by the number of students to get the average score.</p>
                </div>
                <div class="statistic-item">
                    <h3>2. Standard Deviation</h3>
                    <p><strong>Formula:</strong> Standard Deviation = <span>&#8730;(&#931;(x<sub>i</sub> - Mean)<sup>2</sup> / N)</span></p>
                    <p><strong>Description:</strong> Measure the spread of students' scores from the mean. It shows how much scores deviate from the average.</p>
                </div>
                <div class="statistic-item">
                    <h3>3. Z-Scores</h3>
                    <p><strong>Formula:</strong> Z = <span>(x<sub>i</sub> - Mean) / Standard Deviation</span></p>
                    <p><strong>Description:</strong> Calculate how many standard deviations a score is from the mean. It helps in standardizing scores across different datasets.</p>
                </div>
                <div class="statistic-item">
                    <h3>4. Percentiles</h3>
                    <p><strong>Formula:</strong> Percentile Rank = <span>(Number of scores below x<sub>i</sub> / Total number of scores) x 100</span></p>
                    <p><strong>Description:</strong> Determine the percentage of students scoring below a certain score, which helps in assigning grades.</p>
                </div>
                <div class="statistic-item">
                    <h3>5. Grade Distribution</h3>
                    <p><strong>Description:</strong> Based on the z-scores or percentiles, distribute grades (e.g., A, B, C) according to predefined thresholds.</p>
                </div>
            </div>
            <div class="statics-image">
                <img src="AssetsH/Data.jpg" alt="Bell Curve">
            </div>
        </div>
    </div>
    <div class="grading-section" id="GradesAssignment">
        <h1 class="grading-heading">Grades Assignment</h1>

        <table class="grading-table">
            <caption class="caption">Absolute Grading - Letter Grade and its range</caption>
            <tr>
                <th>Letter Grade</th>
                <th>Marks range (max. of 100)</th>
            </tr>
            <tr>
                <td class="Bla">O</td>
                <td class="Bla">>= 90</td>
            </tr>
            <tr>
                <td>A+</td>
                <td>>= 80 but < 90</td>
            </tr>
            <tr>
                <td>A</td>
                <td>>= 70 but < 80</td>
            </tr>
            <tr>
                <td>B+</td>
                <td>>= 60 but < 70</td>
            </tr>
            <tr>
                <td>B</td>
                <td>>= 50 but < 60</td>
            </tr>
            <tr>
                <td>C</td>
                <td>>= 45 but < 50</td>
            </tr>
            <tr>
                <td>F</td>
                <td>
                    < 45</td>
            </tr>
        </table>

        <table class="grading-table">
            <caption class="caption">Relative Grading - Letter Grade and its range</caption>
            <tr class="NoBorder">
                <th>Relative Grading Formula</th>
                <th>Letter Grade</th>
            </tr>
            <tr>
                <td class="Bla">Total Marks >= (Mean + 1.5&sigma;) with a minimum of 90% total marks</td>
                <td class="Bla">O</td>
            </tr>
            <tr>
                <td>Total Marks >= (Mean + 1.0&sigma;) and Total Marks < (Mean + 1.5&sigma;)</td>
                <td>A+</td>
            </tr>
            <tr>
                <td>Total Marks >= (Mean + 0.5&sigma;) and Total Marks < (Mean + 1.0&sigma;)</td>
                <td>A</td>
            </tr>
            <tr>
                <td>Total Marks >= Mean and Total Marks < (Mean + 0.5&sigma;)</td>
                <td>B+</td>
            </tr>
            <tr>
                <td>Total Marks >= (Mean - 1.0&sigma;) and Total Marks < Mean</td>
                <td>B</td>
            </tr>
            <tr>
                <td>Total Marks >= (Mean - 2.0&sigma;) and Total Marks < (Mean - 1.0&sigma;)</td>
                <td>C</td>
            </tr>
            <tr>
                <td>Total Marks < (Mean - 2.0&sigma;)</td>
                <td>F</td>
            </tr>
        </table>
    </div>

    <div class="Section7" id="Insights">
        <h1 style="width: 100%;">Insights</h1>
        <div class="card">
            <img src="AssetsH/C1.png" alt="Relative Grading Image 1">
            <h3>Effective Grade Distribution</h3>
            <p>"Effective grade distribution ensures that all students are evaluated fairly, promoting equity and academic success."</p>
        </div>
        <div class="card">
            <img src="AssetsH/C2.png" alt="Relative Grading Image 2">
            <h3>Balanced Academic Evaluation</h3>
            <p>"Implementing an effective grade distribution strategy ensures a fair assessment of student performance and achievement."</p>
        </div>
        <div class="card">
            <img src="AssetsH/C3.png" alt="Relative Grading Image 3">
            <h3>Improved Grading Fairness</h3>
            <p>"An effective grade distribution approach creates a fair grading system that accurately reflects student achievement and effort."</p>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="AssetsH/Logo2.png" alt="Logo">
            </div>
            <div class="footer-links">
                <a href="#Home">Home</a>
                <a href="#Relative Grading System">Relative Grading System</a>
                <a href="#Absolute Grading System VS Relative Grading System">Absolute Grading System VS Relative Grading System</a>
                <a href="#BellCurve">BellCurve</a>
                <a href="#StaticsMeasure">Statics Measure</a>
                <a href="#GradesAssignment">Grades Assignment</a>
                <a href="#Insights">Insights</a>
            </div>
        </div>
        <h3><span class="copyright"> Online Relative Grading System © 2024</span></h3>
    </footer>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>