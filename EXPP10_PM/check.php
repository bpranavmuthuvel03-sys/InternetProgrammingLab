<?php

$errors = array();

$name = trim($_POST['user_name']);
$password = $_POST['pwd'];
$email = trim($_POST['mail']);
$mobile = trim($_POST['contact']);
$card = trim($_POST['card']);

/* User Name Validation */
if (!preg_match("/^[A-Za-z ]{3,40}$/", $name)) {
    $errors[] = "User name must contain only letters and spaces.";
}

/* Password Validation */
if (!preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).{6,20}$/", $password)) {
    $errors[] = "Password must contain letters and numbers and be 6 to 20 characters.";
}

/* Email Validation */
if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
    $errors[] = "Enter a valid email address.";
}

/* Mobile Validation */
if (!preg_match("/^[6-9][0-9]{9}$/", $mobile)) {
    $errors[] = "Mobile number must contain 10 digits and start with 6-9.";
}

/* Credit Card Validation */
if (!preg_match("/^[0-9]{16}$/", $card)) {
    $errors[] = "Credit card number must contain exactly 16 digits.";
}


/* Display Result */

if (empty($errors)) {

    $maskedCard = "**** **** **** " . substr($card, -4);

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Registration Result</title>";

    echo "<style>
            body {
                font-family: Arial;
                background-color: #eef2f3;
                padding: 40px;
            }

            .result {
                width: 650px;
                margin: auto;
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 0 10px #aaa;
            }

            h2 {
                text-align: center;
                color: green;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #999;
                padding: 12px;
                text-align: left;
            }

            th {
                background-color: #333;
                color: white;
            }

            .back {
                display: block;
                margin-top: 20px;
                text-align: center;
            }
          </style>";

    echo "</head>";
    echo "<body>";

    echo "<div class='result'>";

    echo "<h2>Registration Successful</h2>";

    echo "<table>";

    echo "<tr>
            <th>Field</th>
            <th>Entered Value</th>
          </tr>";

    echo "<tr>
            <td>User Name</td>
            <td>" . htmlspecialchars($name) . "</td>
          </tr>";

    echo "<tr>
            <td>Email</td>
            <td>" . htmlspecialchars($email) . "</td>
          </tr>";

    echo "<tr>
            <td>Password</td>
            <td>********</td>
          </tr>";

    echo "<tr>
            <td>Mobile Number</td>
            <td>" . htmlspecialchars($mobile) . "</td>
          </tr>";

    echo "<tr>
            <td>Credit Card Number</td>
            <td>" . $maskedCard . "</td>
          </tr>";

    echo "</table>";

    echo "<a class='back' href='register.html'>Back to Registration</a>";

    echo "</div>";

    echo "</body>";
    echo "</html>";

} else {

    echo "<h2>Registration Failed</h2>";

    echo "<ul>";

    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }

    echo "</ul>";

    echo "<a href='register.html'>Go Back</a>";
}

?>