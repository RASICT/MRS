<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Body background with image */
        body {
            background: url('assets/img/background.png') no-repeat center center fixed; /* Use background.png */
            background-size: cover; /* Ensure the image covers the entire body */
            background-attachment: fixed; /* Make sure the background image stays fixed */
            background-position: center; /* Center the image in the viewport */
            margin: 0; /* Remove default margin to prevent scrollbars */
            padding: 0;
            font-family: Arial, sans-serif; /* Set a default font for the body */
        }

        /* Container for the form */
        .form-container {
            width: 350px;
            margin: 150px auto; /* Center the container and add space from the top */
            padding: 20px 20px 40px; /* Increased bottom padding for more space */
            background-color: rgba(255, 255, 255, 0.8); /* White with opacity */
            border-radius: 30px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.9); /* Shadow effect */
            text-align: center;
        }

        /* Stylish logo above the username */
        .form-logo {
            width: 80px; /* Adjust size as needed */
            height: 80px; /* Adjust size as needed */
            background: url('assets/img/yozam logo png.png') no-repeat center center; /* Direct reference to logo */
            background-size: cover;
            border-radius: 50%; /* Make it a circle */
            margin: 0 auto 20px; /* Center and add space below */
        }

        /* Style for the input fields */
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for the login button */
        .form-container input[type="submit"] {
            width: 85%;
            padding: 10px;
            margin-top: 10px;
            background-color: #2680bb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #1d6a8c;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <!-- Stylish logo above the form -->
        <div class="form-logo"></div>

        <!-- Login form -->
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
<?php
// login.php

// Include database connection
require_once 'conn.php'; // Adjust the path as necessary

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check credentials
    if ($result->num_rows > 0) {
        // Successful login
        header('Location: problems.php');
        exit();
    } else {
        // Unsuccessful login
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>
