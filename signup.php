<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "signup") or die(mysqli_error($con));

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = trim($_POST['fname']);  // Trim whitespace
    $lastname = trim($_POST['lname']);
    $email = trim($_POST['em']);
    $password = trim($_POST['pass']);

    // Enhanced Validations:
    $errors = [];

    if (empty($firstname)) {
        echo "<script type='text/javascript'> alert('Please enter first name!')</script>";
    }

    elseif (empty($lastname)) {
        echo "<script type='text/javascript'> alert('Please enter last name!')</script>";
    }

    elseif (empty($email)) {
        echo "<script type='text/javascript'> alert('Please enter your email!')</script>";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // Validate email format
        echo "<script type='text/javascript'> alert('Please enter valid email!')</script>";
    }

    elseif (empty($password)) {
        echo "<script type='text/javascript'> alert('Please enter password!')</script>";
    } 
    elseif (strlen($password) < 8) {  // Minimum password length
        echo "<script type='text/javascript'> alert('Please enter valid password of 8 characters or more!')</script>";
    }

    // // Check for duplicate email before insertion
    // $emailCheck = "SELECT * FROM form WHERE email = '$email'";
    // $emailResult = mysqli_query($con, $emailCheck);
    // elseif (mysqli_num_rows($emailResult) > 0) {
    //     echo("This email address is already in use.");
    // }

    // Sanitize and Secure User Input:
    else {
        $firstname = mysqli_real_escape_string($con, $firstname);
        $lastname = mysqli_real_escape_string($con, $lastname);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        // Prepared Statement for Enhanced Security
        $query = "INSERT INTO form (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $password);
        mysqli_stmt_execute($stmt);

        header("location: signup_success.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src = "validation.js"></script>
    <link rel="stylesheet" href="signup_styling.css">
    <title>Sign up</title>
</head>

<body>
    <nav class="navbar navbar-inverse" style="color: #f8f9fa;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-left">
                <a href="startup.html">
                    <img src="logo.png" style="width: 50px;">
                </a>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="startup.html">Home</a></li>
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="box" style="float: inline-start;height: 490px; color: #f8f9fa;">
        <img src="signup.png" style="width: 200px; height: 200px; margin-left: 90px; margin-top: 90px;">
        <h2
            style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #f8f9fa;">
            Welcome!</h2>
    </div>
    <div class="card" style="float: inline-start; height: 490px; width: 300px;">
        <form method = "POST" onsubmit = "return validateEmail();">
            <h2 style = "color: #f8f9fa;">Sign Up</h2>
            <input type = "text" placeholder="First Name" id = "firstname" name = "fname">
            <br><br>
            <input type = "text" placeholder="Last Name" id = "lastname" name = "lname">
            <br><br>
            <input type="text" placeholder="Email ID" id = "email" name = "em" pattern = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g">
            <br><br>
            <input type="password" placeholder="Password" style= "margin-top: 0px;" id = "password" name = "pass" minlength = "8">
            <br><br>
            <button
                style="margin-top: 0px; font-size: large; font-family:Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" type = "submit">Sign
                Up</button>
            <a href="login.php" style = "padding-left: 35px">Already have an account? Click here</a>
        </form>
    </div>
    <div style="clear: both;"></div> <!-- Clear the float -->
    <br><br><br><br>
    <footer style="background-color: #711DB0;">
        <div class="container" style="width: 100%; height: 200px; margin-left: 80px;">
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #ffffff; font-size: medium;">Home Uni</h5>
                    <p
                        style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin: 0; color: #ffffff; margin-right: 30px;">
                        Our mission is to empower individuals, regardless of their location or schedule, to pursue their
                        educational aspirations and achieve their goals.
                    </p>
                </div>
                <div class="col-md-4">
                    <br>
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #ffffff;font-size: medium;">Our World</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"></li>
                        <a href="faq.html"
                            style="margin-left: 50px;color: #01000d;letter-spacing: 2px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin: 0; color: #ffffff;">Frequently
                            Asked
                            Questions</a>
                        </li>
                        <li class="mb-1" style="padding-top: 10px;">
                            <a href="book.html"
                                style="margin-left: 650px;color: #01000d;letter-spacing: 2px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin: 0; padding-top: 20px; color: #ffffff;">Check
                                Courses</a>
                        </li>
                        <li class="mb-1" style="padding-top: 10px;">
                            <a href="login.html"
                                style="margin-left: 650px; color: #01000d;letter-spacing: 2px;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin: 0; padding-top: 20px; color: #ffffff;">Sign
                                Up</a>
                        </li>
                        <li class="mb-1" style="padding-top: 10px;">
                            <a href="help.html"
                                style="margin-left: 650px;color: #01000d;letter-spacing: 2px;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin: 0; padding-top: 20px; color: #ffffff;">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <br>
                    <h5 class="mb-1" style="letter-spacing: 2px; color: #ffffff; font-size: medium;">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p
                                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #ffffff;">
                                <i class="fas fa-map-marker-alt pe-2"></i>Juhu Lane, Mumbai</p>
                        </li>
                        <li>
                            <p
                                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #ffffff;">
                                <i class="fas fa-phone pe-2"></i>+ 91 82691 12381</p>
                        </li>
                        <li>
                            <p
                                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;color: #ffffff;">
                                <i class="fas fa-envelope pe-2 mb-0"></i>homeuni@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ©2023 Copyright:
            <a class="text-dark" href="book.html">HomeUni.com</a>
        </div>
    </footer>
</body>
</html>