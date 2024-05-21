<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="https://i.ibb.co/K0k0jBR/first-aid-kit.png" type="image/x-icon">
    <style>
        .contact-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .contact-img {
            max-width: 800px;
            height: 400px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.502);
        }

        .contact-details {
            margin-top: 40px;
        }

        .contact-info {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .address {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-book-appointment {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-book-appointment:hover {
            background-color: #767676;
        }

        .hospital-info {
            margin-top: 40px;
            text-align: center;
            max-width: 800px;
        }

        .hospital-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .hospital-info p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .hospital-images {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .hospital-images img {
            width: 500px;
            height: 300px;
            margin: 0 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.502);
        }

        .additional-content {
            max-width: 800px;
            margin-top: 20px;
            text-align: center;
        }

        .additional-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .additional-content p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 2px 0;
            width: 100%;
            text-align: center;
            bottom: 0;
        }

        .footer p {
            font-size: 16px;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-img {
                max-width: 100%;
                height: auto;
            }

            .contact-info,
            .address {
                font-size: 16px;
            }

            .btn-book-appointment {
                padding: 8px 16px;
                font-size: 16px;
            }

            .hospital-info {
                margin-top: 20px;
                max-width: 100%;
            }

            .hospital-info h2 {
                font-size: 22px;
            }

            .hospital-info p {
                font-size: 16px;
            }

            .hospital-images {
                flex-direction: column;
            }

            .hospital-images img {
                width: 90%;
                height: auto;
                margin: 10px 0;
            }

            .additional-content {
                max-width: 100%;
                margin-top: 10px;
            }

            .additional-content h2 {
                font-size: 22px;
            }

            .additional-content p {
                font-size: 16px;
            }

            .footer p {
                font-size: 14px;
            }

            .logo {
                max-width: 150px;
            }
        }
    </style>
</head>

<body>

    <div class="contact-container">
        <img src="https://images.unsplash.com/photo-1577055384120-62cec20c02f2?q=80&w=2071&auto=format&fit=
        crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Contact Image" class="contact-img">
        <div class="contact-details">
            <div class="contact-info">
                <p>Contact us at: Florida@gmail.com</p>
                <p>Phone: +1 (123) 456-7890</p>
            </div>
            <div class="address">
                <p>123 Mysore, Bangalore, India</p>
            </div>
        </div>
        <button class="btn-book-appointment" id="bookAppointmentBtn">Book Appointment > </button>
        <div class="hospital-info">
            <h2>About Our Hospital</h2>
            <p>We are committed to providing exceptional healthcare services to our community. Our hospital offers a
                wide range of medical specialties and services, including emergency care, surgery, radiology, and more.
            </p>
        </div>
        <div class="hospital-images">
            <img src="https://plus.unsplash.com/premium_photo-1675686363460-25aa1039e94b?q=80&w=2043&auto=format&fit=crop&
            ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hospital Image 1">
            <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?q=80&w=1856&auto=format&fit=crop&ixlib=
            rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hospital Image 2">
        </div>
        <div class="additional-content">
            <h2>Our Mission</h2>
            <p>Our mission is to provide compassionate, high-quality care to our patients and their families, focusing
                on their individual needs and promoting wellness in our community.</p>
            <img src="https://ideasforus.org/wp-content/uploads/2018/09/Logo-florida-hospital-color.png" alt="Your Logo" class="logo">
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Florida Hospitals. All rights reserved.</p>
    </footer>
    <script>
        document.getElementById("bookAppointmentBtn").addEventListener("click", function() {
            window.location.href = "Appointment.php";
        });
    </script>
</body>

</html>