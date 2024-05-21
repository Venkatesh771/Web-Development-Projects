<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointment Booking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="https://i.ibb.co/K0k0jBR/first-aid-kit.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        .logo {
            margin-left: 50px;
            margin-top: 4px;
            margin-bottom: 4px;
            width: 100px;
            height: 35px;
        }

        .navbar-nav {
            margin-right: 15px;
        }

        .navbar {
            /* font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; */
            font-family: "Noto Sans", sans-serif;
            background-color: #000 !important;
            padding: 1px;
        }

        .spaced-link {
            margin-right: 14px;
        }

        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }

        .navbar-nav .nav-item.active .nav-link {
            color: #fff !important;
        }

        .main-image {
            max-width: 90%;
            height: auto;
            border-radius: 10px;
        }

        .main-text {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-family: "Noto Sans", sans-serif;
        }

        .main-text p {
            font-size: 17px;
            font-weight: 600;
        }

        .btn-appointment {
            background-color: #000;
            margin-top: 10px;
            font-weight: 600;
            font-size: 17px;
            padding: 10px 10px;
            border: none;
            border-radius: 10px;
            font-family: "Noto Sans", sans-serif;
        }

        .btn-appointment:hover {
            background-color: #767676;
        }

        /* Added styles */
        .left-content {
            font-weight: 600;
            font-family: "Nunito", sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .right-image {
            padding: 20px;
        }

        .hospital-text {
            background-color: rgba(204, 203, 203, 0.979);
            color: #ffffff;
            text-align: center;
            margin-bottom: 25px;
            border-left: 7px rgb(21, 0, 255) solid;
            border-right: 7px rgb(21, 0, 255) solid;
            border-radius: 3px;
            margin-top: 3px;
        }

        #headings {
            /* font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; */
            font-family: "Nunito", sans-serif;
            font-size: 24px;
            padding: 7px 0;
            font-weight: 600;
        }

        .hospital-text span {
            background-color: rgba(0, 0, 0, 0.801);
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .quot {
            font-style: italic;
            font-size: 28px;
            color: rgb(255, 42, 0);
        }

        .left-content {
            margin-top: 50px;
        }

        .left-content p {
            line-height: 1;
            margin-left: 15px;
            font-size: 16px;
            font-weight: 600;
        }

        .left-content .blue {
            font-weight: 600;
            font-size: 18px;
            color: rgb(2, 2, 206);
            font-family: "Raleway", sans-serif;
        }

        #imgbdr {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.502);
            margin-bottom: 25px;
        }

        @media (max-width: 768px) {

            .left-content,
            .right-image {
                padding: 10px;
            }
        }

        .specialist-grid {
            font-family: "Noto Sans", sans-serif;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-top: 20px;
            padding: 20px;
            z-index: 1;
        }

        .specialist-item {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgb(0, 0, 0);
            padding: 20px;
            text-align: center;
        }


        .specialist-item img {
            width: 50%;
            height: auto;
            display: block;
            filter: brightness(70%) sepia(100%) hue-rotate(180deg) saturate(500%) contrast(0.8);
            margin: 0 auto;
        }

        .specialist-item p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .specialist-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /*Doctors*/
        /* Hide doctor items beyond the first two */
        .doctor-item:nth-child(n+3) {
            display: none;
        }

        /* Doctor item styles */
        .doctor-item {
            font-family: "Nunito", sans-serif;
            font-weight: 500;
            margin-top: 20px;
            margin-bottom: 5px;
            border: none;
            border-radius: 10px;
            padding: 10px 30px;
            background-color: #dfdfdfa2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            max-width: 500px;
            margin-left: 50px;
            box-shadow: 0 2px 2px rgba(80, 80, 80, 0.502);
        }

        /* Doctor image styles */
        .doctor-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Doctor name styles */
        .doctor-name {
            font-family: "Noto Sans", sans-serif;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Doctor specialty styles */
        .doctor-specialty {
            font-size: 16px;
            margin-top: 20px;
        }

        /* Arrow button styles */
        #prevBtn,
        #nextBtn {
            margin-top: 2px;
            font-size: 20px;
            padding: 5px 8px;
            margin-bottom: 15px;
        }

        .doctor-image {
            max-width: 220px;
            max-height: 220px;
            height: auto;
            border-radius: 10px;
        }

        /* Contact image styles */
        .contact-img {
            width: 95%;
            height: 90%;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.502);
        }

        /* Contact details styles */
        .contact-info {
            font-family: "Noto Sans", sans-serif;
            padding: 20px;
            margin-top: 40px;
        }

        .contact-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .contact-info p {
            font-size: 17px;
            margin-bottom: 20px;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-info ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Footer styles */
        .footer {
            font-weight: 600;
            font-family: "Noto Sans", sans-serif;
            margin-top: 25px;
            background-color: #000000;
            color: #fff;
            padding: 20px 0;
        }

        /* Footer logo styles */
        .footer-logo {
            max-width: 250px;
            height: auto;
        }

        /* Quick links styles */
        .quick-links {
            list-style: none;
            padding: 0;
        }

        .quick-links li {
            margin-bottom: 5px;
        }

        .quick-links li a {
            color: #fff;
            text-decoration: none;
            font-size: 15px;
        }

        /* Copyright styles */
        .copy-right {
            text-align: right;
            font-size: 15px;
            margin-top: 70px;
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            /* Navbar adjustments */
            .navbar-brand {
                margin-left: 20px;
            }

            .logo {
                margin-left: 0;
                width: 100px;
                height: 35px;
            }

            .navbar-nav {
                margin-right: 0;
                text-align: center;
                margin-right: 0;
            }

            .spaced-link {
                margin-right: 0;
                margin-bottom: 10px;
            }

            /* Main text and image adjustments */
            .main-text {
                text-align: center;
                height: auto;
            }

            .main-text h1 {
                font-size: 24px;
            }

            .main-text p {
                font-size: 15px;
            }

            .btn-appointment {
                margin-bottom: 20px;
                font-size: 18px;
                padding: 8px 10px;
            }

            .main-image {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }

            .left-content {
                text-align: center;
            }

            .left-content p {
                line-height: 1.5;
            }

            /* Specialist grid adjustments */
            .specialist-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .specialist-item {
                padding: 10px;
            }

            .specialist-item img {
                width: 60%;
            }

            /* Doctor items adjustments */
            .doctor-item {
                margin-left: 0;
                max-width: 100%;
                padding: 10px;
                text-align: center;
                /* Center the content */
            }

            .doctor-item img {
                display: block;
                margin: 10px auto;
                max-width: 150px;
                max-height: 150px;
            }

            .doctor-item h3 {
                font-size: 20px;
            }

            .doctor-item p {
                font-size: 17px;
            }

            /* Contact image and info adjustments */
            .contact-img {
                width: 100%;
                height: auto;
                margin: 0 auto;
                margin-top: 10px;
            }

            .contact-info {
                padding: 10px;
                margin-top: 20px;
            }

            .contact-info h2 {
                font-size: 20px;
            }

            .contact-info p {
                font-size: 15px;
            }

            .contact-info ul li {
                font-size: 14px;
            }

            /* Footer adjustments */
            .footer-logo {
                max-width: 150px;
                margin-bottom: 20px;
            }

            .quick-links li a {
                font-size: 14px;
            }

            .copy-right {
                text-align: center;
                font-size: 14px;
                margin-top: 20px;
            }
        }

        /* Additional styles for smaller mobile devices */
        @media (max-width: 576px) {

            /* Navbar adjustments */
            .navbar-toggler {
                margin-right: 10px;
            }

            .navbar-nav {
                margin: 0 auto;
            }

            /* Main text and image adjustments */
            .main-text h1 {
                font-size: 20px;
            }

            .main-text p {
                font-size: 14px;
            }

            .btn-appointment {
                font-size: 14px;
            }

            .main-image {
                margin-bottom: 15px;
            }

            /* Specialist grid adjustments */
            .specialist-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .specialist-item img {
                width: 70%;
            }

            /* Doctor items adjustments */
            .doctor-item {
                padding: 5px;
            }

            .doctor-item img {
                max-width: 80px;
                max-height: 80px;
            }

            .doctor-item h3 {
                font-size: 16px;
            }

            .doctor-item p {
                font-size: 13px;
            }

            /* Contact image and info adjustments */
            .contact-img {
                margin-top: 5px;
            }

            .contact-info h2 {
                font-size: 18px;
            }

            .contact-info p {
                font-size: 14px;
            }

            .contact-info ul li {
                font-size: 13px;
            }

            /* Footer adjustments */
            .footer-logo {
                max-width: 150px;
            }

            .quick-links li a {
                font-size: 13px;
            }

            .copy-right {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhoBnw4uRRGnaW_qwK42M_H7OUExRjElOmgE9SeH6bQA&s" alt="Logo" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link spaced-link" href="home_page.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link spaced-link" href="Contact.php">Contact Us</a>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item dropdown active">
                        <a class="nav-link spaced-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php">Logout <i class="fas fa-sign-out-alt ml-1"></i></a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link spaced-link" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link spaced-link" href="Register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-4" id="Home_Nav">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="https://img.freepik.com/free-vector/hospital-building-concept-illustration_114360-8240.jpg?t=st=1710566506~exp=1710570106~hmac=62ac2c3dec6664
                68316f097b381e9b8d371dc793b03e09155c60bb149d1d3b63&w=740" alt="Main Image" class="main-image">
            </div>
            <div class="col-md-6 main-text">
                <div>
                    <h1>Stay Safe, Stay Healthy</h1>
                    <p>Our Hospital Is All About Healing..!</p>
                    <button class="btn btn-primary btn-lg btn-appointment" id="bookAppointmentBtn">Book An Appointment
                        ></button>
                </div>
            </div>
        </div>
        <div class="hospital-text">
            <h2 id="headings"><span>Florida Hospital</span></h2>
        </div>
        <!-- Additional Layout -->
        <div class="row mt-4">
            <div class="col-md-6 left-content">
                <h2><span class="quot">"</span>Over the Past 15 Years</h2>
                <p>It has been a prrivilage to build the <span class="blue">Florida Group Of Hospitals</span><br>Our
                    Hospital Provides Facility,For <span class="blue">MultiSpeclity</span> Needs<span class="quot">"</span></p>
            </div>
            <div class="col-md-6 right-image">
                <img src="https://npr.brightspotcdn.com/dims4/default/a0a1d86/2147483647/strip/true/crop/650x366+0+54/resize/1200x675!/quality/90/?url=http%3A%2F%2Fmediad.publicbroadcasting.net%2Fp%2Fhealthnewsfl%2Ffiles%2F201605%2Fflorida_hospital_tampa_2.jpg" alt="Right Image" class="main-image" id="imgbdr">
            </div>
        </div>
        <div class="hospital-text" id="Specialite_Nav">
            <h2 id="headings"><span>Our Specialites</span></h2>
        </div>
        <div class="specialist-grid">
            <!-- Four images in a row -->
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/anesthesiology-icon.png" alt="Specialist 1">
                <p>Anaesthesiology</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/bariatric-weighing.png" alt="Specialist 2">
                <p>Bariatric Sciences</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/bone-marrow-icon.png" alt="Specialist 3">
                <p>Bone Marrow Transplant</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/06/sample-cardiology-icon.png" alt="Specialist 4">
                <p>Cardiac Sciences</p>
            </div>

            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/dentistry-main-icon.png" alt="Specialist 1">
                <p>Dentistry</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/dermatology-main.png" alt="Specialist 2">
                <p>Dermatology</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/emergency-medicine.png" alt="Specialist 3">
                <p>Emergency Medicine</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/diabetics-icon.png" alt="Specialist 4">
                <p>Endocrinology and
                    Diabetology</p>
            </div>

            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/family-medicine.png" alt="Specialist 1">
                <p>Family Medicine</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/gastroentorology-main-icon.png" alt="Specialist 2">
                <p>Gastroenterology</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/general-medicine.png" alt="Specialist 3">
                <p>General Medicine</p>
            </div>
            <div class="specialist-item">
                <img src="https://www.sparshhospital.com/wp-content/uploads/2023/07/general-surgery.png" alt="Specialist 4">
                <p>General Surgery</p>
            </div>
        </div>
        <div class="hospital-text" id="Doctors_Nav">
            <h2 id="headings"><span>Our Doctors</span></h2>
        </div>
    </div>
    <div class="container mt-4">
        <!-- Previous content here -->
        <div class="row mt-4" id="doctor-grid">
            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images/dr-sadiq-sikora-best-gi-cancer-surgeon-in-bangalore.png" alt="Doctor 1" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. John Doe</h3>
                        <p>Director - Gastrointestinal Surgery and Liver Transplantation</p>
                        <p>MS (General Surgery), FACS, FRCS, Fellowship in Surgical Oncology</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images/dr-sreekanth-shetty-cardiologist-in-bangalore.png" alt="Doctor 2" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. Jane Smith</h3>
                        <p>Senior Consultant & Head - Interventional Cardiology
                            MD (General Medicine), DM (Cardiology)</p>
                        <p>Department - Institute of Cardiac Sciences</p>
                    </div>
                </div>
            </div>
            <!-- Add more doctor items similarly -->
            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images/dr-adil.png" alt="Doctor 3" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. Emily Brown</h3>
                        <p>Head & Senior Consultant - Cardiothoracic & Vascular Surgery
                            MS (General Surgery), M.Ch (CTVS), FACS (USA), FMICS (USA)</p>
                        <p>Department - Institute of Cardiac Sciences</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images/dr-chandrashekar.png" alt="Doctor 4" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. Michael Johnson</h3>
                        <p>Director - Orthopaedics
                            MS (Orthopedics), FIJS (Germany, USA, Belgium & South Korea)</p>
                        <p>Department - Orthopaedics</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images/arjun-srivastava-doc.png" alt="Doctor 3" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. Arjun Srivatsa</h3>
                        <p>Senior Consultant & Head of the Department of Neurosciences</p>
                        <p>Department - Neurology</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 doctor-item">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Left side - Doctor image -->
                        <img src="https://www.sakraworldhospital.com/assets-newpage/images//lorence-petter.png" alt="Doctor 4" class="doctor-image">
                    </div>
                    <div class="col-md-6">
                        <!-- Right side - Doctor name and specialty -->
                        <h3>Dr. Lorance Peter</h3>
                        <p>Director - Gastroenterology & Hepatology
                            MBBS, MD (General Medicine)</p>
                        <p>Department - Medical Gastroenterology</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arrow buttons -->
        <div class="row mt-4 justify-content-center">
            <button id="prevBtn" class="btn btn-primary mr-2">
                < </button>
                    <button id="nextBtn" class="btn btn-primary"> > </button>
        </div>
        <div class="hospital-text" id="Contact_Nav">
            <h2 id="headings"><span>Contact Us</span></h2>
        </div>
        <div class="row">
            <!-- Left side - Image -->
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1586773860383-dab5f3bc1bcc?q=80&w=2027&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Contact Image" class="contact-img">
            </div>
            <!-- Right side - Contact details -->
            <div class="col-md-6">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or inquiries, feel free to contact us using the information below:</p>
                    <ul>
                        <li><strong>Email:</strong> Florida@gmail.com</li>
                        <li><strong>Phone:</strong> +91 234567890</li>
                        <li><strong>Address:</strong> 123 Mysore, Bangalore, India</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-4">
                    <img src="https://cdn.worldvectorlogo.com/logos/florida-hospital-connected-care.svg" alt="Footer Logo" class="footer-logo">
                </div>

                <!-- Quick Links -->
                <div class="col-md-4">
                    <h4>Quick Links</h4>
                    <ul class="quick-links">
                        <li><a href="#Home_Nav">Home</a></li>
                        <li><a href="#Specialite_Nav">Our Specialites</a></li>
                        <li><a href="#Doctors_Nav">Our Doctors</a></li>
                        <li><a href="#Contact_Nav">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Copyright -->
                <div class="col-md-4">
                    <p class="copy-right">© 2024 Florida Hospital, All Rights Reserved.</p>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("bookAppointmentBtn").addEventListener("click", function() {
                window.location.href = "Appointment.php";
            });
            document.addEventListener("DOMContentLoaded", function() {
                const prevBtn = document.getElementById("prevBtn");
                const nextBtn = document.getElementById("nextBtn");
                const doctorItems = document.querySelectorAll(".doctor-item");
                let currentIndex = 0;

                // Show the next two doctors
                function showNextDoctors() {
                    doctorItems[currentIndex].style.display = "none";
                    doctorItems[currentIndex + 1].style.display = "none";

                    currentIndex += 2;
                    if (currentIndex >= doctorItems.length) {
                        currentIndex = 0;
                    }

                    doctorItems[currentIndex].style.display = "block";
                    doctorItems[currentIndex + 1].style.display = "block";
                }

                // Show the previous two doctors
                function showPrevDoctors() {
                    doctorItems[currentIndex].style.display = "none";
                    doctorItems[currentIndex + 1].style.display = "none";

                    currentIndex -= 2;
                    if (currentIndex < 0) {
                        currentIndex = doctorItems.length - 2;
                    }

                    doctorItems[currentIndex].style.display = "block";
                    doctorItems[currentIndex + 1].style.display = "block";
                }

                // Event listeners for arrow buttons
                nextBtn.addEventListener("click", showNextDoctors);
                prevBtn.addEventListener("click", showPrevDoctors);
            });
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>