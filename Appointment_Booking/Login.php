<?php
    session_start();
    
    if (isset($_SESSION['username'])) {
        header("Location: home_page.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_register";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                echo "<script>
                document.body.innerHTML += '<div id=\"login-popup\" style=\"position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); display: flex; justify-content: center; align-items: center; z-index: 1000;\"><div style=\"background: white; padding: 20px; border-radius: 5px; text-align: center;\"><h2>Login Successful</h2><button onclick=\"location.href=\'home_page.php\'\">Go to Home</button></div></div>';
            </script>";
                echo "<style>
                #login-popup button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-top: 20px;
                }
                #login-popup button:hover {
                    background-color: #45a049;
                }
                </style>";
            } else {
                echo "<script>alert('Invalid password.');</script>";
            }
        } else {
            echo "<script>alert('Invalid user.');</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital Appointment Booking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="https://i.ibb.co/K0k0jBR/first-aid-kit.png" type="image/x-icon">
    <style>
        .container {
            max-width: 1200px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
        }

        .login-img {
            width: 80%;
            display: block;
            margin: 0 auto;
        }

        .form-control {
            width: 100%;
        }

        .btn-login {
            font-size: 16px;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .card-header {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://img.freepik.com/free-vector/man-dentist-shows-xray-picture-tooth-patient-tooth-
            inspection-diagnosis-treatment-appointment-dental-clinic_575670-880.jpg?w=826&t=st=1710569859~exp=1710570459
            ~hmac=04204ea2c93a2c28b6ffa6f4e93edc30d042f6a3f562e26995c06adcb64c2320" alt="Side Image" class="login-img">
            </div>
            <div class="col-md-6">
                <div class="card login-form">
                    <div class="card-body p-4">
                        <div class="card-header">Login</div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
                            <a href="#" class="text-center d-block my-3">Forgot password?</a>
                        </form>
                        <hr>
                        <div class="card-footer text-center">
                            <p class="mb-0">Don't have an account? <a href="Login.php">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>