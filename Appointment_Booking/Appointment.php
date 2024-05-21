<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/K0k0jBR/first-aid-kit.png" type="image/x-icon">
    <title>Appointment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }

        form {
            background-color: #a0a0a067;
            backdrop-filter: blur(20px);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        .grp label {
            width: 45%;
        }

        .grp input {
            width: 90%;
            background-color: #fff;
        }

        .grp select {
            width: 90%;
        }

        #appointmentTime {
            width: 70%;
        }

        #timePeriod {
            padding: 10px;
            width: 20%;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #000000;
            border-radius: 5px;
        }

        button {
            font-size: 16px;
            width: 100%;
            padding: 10px;
            margin-top: 12px;
            background-color: #0278ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            color: #fff;
            background-color: #0065d9;
        }

        .appo-page {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            max-width: 1200px;
            margin: 70px 40px;
        }

        .left img {
            height: 450px;
            width: 450px;
            margin-left: 50px;
            margin-right: 60px;
        }

        .right h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .grp {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media only screen and (max-width: 600px) {
            .appo-page {
                flex-direction: column;
                margin: 30px auto;
                gap: 0;
            }

            .left img {
                margin: 20px 40px;
                width: 80%;
                height: auto;
            }

            .right {
                width: 90%;
                margin: 10% 0%;
            }

            form {
                width: 100%;
                max-width: none;
            }

            .grp label {
                width: 45%;
                font-size: 17px;
            }

            .grp input {
                width: 70%;
            }

            .grp select {
                width: 70%;
            }

            #appointmentTime {
                width: 40%;
            }

            #timePeriod {
                padding: 8px;
                width: 30%;
            }

            button {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>
    <div class="appo-page">
        <div class="left">
            <img src="https://img.freepik.com/free-vector/customer-behavior-concept-illustration_114360-7445.jpg?
            w=740&t=st=1710310549~exp=1710311149~hmac=4793632f50ee544d1a3a5f65e710b58b84dfd3b0fe5cf8589905a8cf8bd34d75" 
            alt="Image">
        </div>
        <div class="right">
            <form name="submit-to-google-sheet" action="https://api.web3forms.com/submit" method="POST" onsubmit="return validateForm()">
                <h2>Appointment</h2>
                <input type="hidden" name="access_key" value="55b17a47-ec07-4043-9864-218d84ce5a88">
                <input type="hidden" name="subject" value="New Appointment..!">
                <div class="grp">
                    <label for="name">Patient Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="grp">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="grp">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="grp">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="grp">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div class="grp">
                    <label for="appointmentDate">Appointment Date:</label>
                    <input type="date" id="appointmentDate" name="appointmentDate" required>
                </div>

                <div class="grp">
                    <label for="appointmentTime">Appointment Time:</label>
                    <input type="time" id="appointmentTime" name="appointmentTime" required>
                    <select id="timePeriod">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
                <button type="submit">Book Appointment</button>
            </form>
        </div>
    </div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbz4cK9OR3Vys7TR1yn71y6aGN6iuWENP1GeLpnKHttEZzJSRt4R1V6Z8azKH5RYu0V4/exec';
        const form = document.forms['submit-to-google-sheet'];

        form.addEventListener('submit', e => {
            e.preventDefault();

            const validationErrors = validateForm();
            if (validationErrors.length > 0) {
                alert(validationErrors.join("\n"));
                return;
            }

            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    console.log('Success! Data sent to Google Sheets:', response);
                    return fetch(form.action, {
                        method: form.method,
                        body: new FormData(form)
                    });
                })
                .then(response => {
                    console.log('Success! Data sent to Web3Forms:', response);
                    const successMessage = document.createElement('div');
                    successMessage.style.color = 'Black';
                    successMessage.style.marginTop = '12px';
                    successMessage.style.textAlign = 'center';
                    successMessage.textContent = 'Appointment booked successfully!';
                    form.appendChild(successMessage);
                    setTimeout(() => {
                        form.reset();
                        form.removeChild(successMessage);
                    }, 3000);
                })
                .catch(error => console.error('Error:', error));
        });

        function validateForm() {
            const errors = [];

            // Validate Name
            var name = document.getElementById("name").value;
            if (!/^(?=.*[a-zA-Z])[a-zA-Z ]{3,}$/.test(name)) {
                errors.push("Invalid Name..! it should be at least 3 to 18 characters and contain only alphabets, but not numbers and special symbols.");
            }

            var phone = document.getElementById("phone").value;
            if (!/^\d{10}$/.test(phone)) {
                errors.push("Invalid Phone Number..! Please enter a 10-digit number without any special characters And Symbols.");
            }
            var email = document.getElementById("email").value;
            if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
                errors.push("Invalid Email Address..! Please enter a valid email address.");
            }
            var age = document.getElementById("age").value;
            if (isNaN(age)) {
                errors.push("Invalid Age.! Please enter a valid Age.");
            }

            return errors;
        }

        var currentDate = new Date();
        var currentDateString = currentDate.toISOString().split('T')[0];
        var currentHour = currentDate.getHours();
        var currentMinute = currentDate.getMinutes();
        var amPM = currentHour >= 12 ? 'PM' : 'AM';
        currentHour = currentHour % 12;
        currentHour = currentHour ? currentHour : 12;
        var currentTimeString = currentHour + ":" + (currentMinute < 10 ? '0' : '') + currentMinute;
        document.getElementById("appointmentDate").min = currentDateString;
        document.getElementById("appointmentTime").min = currentTimeString;
        document.getElementById("timePeriod").addEventListener("change", function() {
            var timeInput = document.getElementById("appointmentTime").value;
            var selectedPeriod = this.value;
            if (selectedPeriod === "PM") {
                var hours = parseInt(timeInput.split(":")[0]);
                if (hours < 12) {
                    hours += 12;
                }
                timeInput = hours + ":" + timeInput.split(":")[1];
            } else {
                var hours = parseInt(timeInput.split(":")[0]);
                if (hours === 12) {
                    hours = 0;
                }
                timeInput = (hours < 10 ? '0' : '') + hours + ":" + timeInput.split(":")[1];
            }
            document.getElementById("appointmentTime").value = timeInput;
        });
    </script>
</body>

</html>