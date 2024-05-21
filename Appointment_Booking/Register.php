<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Hospital Appointment Booking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="https://i.ibb.co/K0k0jBR/first-aid-kit.png" type="image/x-icon">
    <style>
        .register-form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            margin-top: 25px;
            height: 80vh;
        }

        .form-group {
            margin-bottom: 3px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-group label {
            width: 45%;
        }

        .form-group input {
            width: 100%;
        }

        .password-input {
            width: calc(100% - 40px);
        }

        label {
            display: block;
            margin: 10px 0;
        }

        .form-group select {
            width: 100%;
        }

        .btn-toggle-password {
            padding: 0.375rem 0.75rem;
            font-size: 0.8rem;
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .main-image {
            max-width: 100%;
            height: auto;
            margin-right: 70px;
        }

        .col-md-6.text-center {
            margin-bottom: 10px;
        }

        h2 {
            font-size: 22px;
        }

        .col-md-6.text-center::after {
            content: "";
            flex: 1;
        }

        label {
            font-size: 16px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="password"],
        input[type="email"],
        select {
            font-size: 14px;
            padding: 3px 10px;
        }
    </style>
</head>

<body>
    <?php
    function validateName($name)
    {
        return preg_match('/^[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>?\'"\/\\[\]|`~\s]{6,16}$/', $name);
    }

    function validatePassword($password)
    {
        return strlen($password) >= 6;
    }

    function validatePhone($phone)
    {
        return preg_match('/^\d{10}$/', $phone);
    }

    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!validateName($_POST['username'])) {
            $errors['username'] = 'Invalid username. Name should be 6 to 16 characters long and can contain alphabets and numbers.';
        }

        if (!validatePassword($_POST['password'])) {
            $errors['password'] = 'Invalid password. Password should be at least 6 characters long.';
        }

        if (!validatePhone($_POST['phone'])) {
            $errors['phone'] = 'Invalid phone number. Phone number should contain only numbers and be 10 digits long.';
        }

        if (!validateEmail($_POST['email'])) {
            $errors['email'] = 'Invalid email address.';
        }

        if (!empty($errors)) {
            echo "<script>";
            foreach ($errors as $error) {
                echo "alert('" . $error . "');";
            }
            echo "</script>";
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login_register";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $email = $_POST['email'];
            $check_email_query = "SELECT * FROM users WHERE email='$email'";
            $result = $conn->query($check_email_query);
            if ($result->num_rows > 0) {
                echo "<script>alert('User with this email already exists.');</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $password, $email);

                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($stmt->execute()) {
                    echo "<script>
                        document.body.innerHTML += '<div id=\"success-popup\" style=\"position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); display: flex; justify-content: center; align-items: center; z-index: 1000;\"><div style=\"background: white; padding: 20px; border-radius: 5px; text-align: center;\"><h2>Account Has Been Created</h2><button onclick=\"location.href=\'Login.php\'\">Login</button></div></div>';
                    </script>";
                    echo "<style>
                        #success-popup button {
                            background-color: #4CAF50;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            margin-top: 20px;
                        }
                        #success-popup button:hover {
                            background-color: #45a049;
                        }
                        </style>";
                } else {
                    echo "<script>alert('Registration failed. Please try again.');</script>";
                }
    
                $stmt->close();
            }
            $conn->close();
        }
    }
    ?>


    <div class="container-center">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="https://img.freepik.com/free-vector/doctor-nurse-study-discuss-
                xray-patient-lung-image-man-pulmonologist-woman-therapist-assistant-
                examine-fluorography-result-disease-determination_575670-456.jpg?t=st=1710948936~
                exp=1710949536~hmac=9cf9c74ac9adeb14fe92de27a58092fcba55af1dff44c762d5a0048ba9613027" 
                alt="Main Image" class="main-image">
            </div>
            <div class="col-md-6">
                <form id="registration_form" class="register-form" method="post" 
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h2 class="text-center mb-3">Register</h2>
                    <div class="form-group">
                        <label for="role">Register As:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Select</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                            <option value="receptionist">Receptionist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" 
                        placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control password-input" id="password" 
                            name="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-toggle-password" 
                                type="button" id="togglePassword">Show</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" 
                        placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" 
                        placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-signup btn-block mt-3 mb-3">Signup</button>
                    <div class="text-center mt-2">
                        <p>Already have an account? <a href="Login.php">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordField = $("#password");
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).text('Hide');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).text('Show');
                }
            });
        });
    </script>
</body>

</html>
