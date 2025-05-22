<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "signup") or die(mysqli_error($con));
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['em'];
        $password = $_POST['pass'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "select * from form where email = '$email' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: home.html");
                        exit;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";

        }
        else
        {
            echo "<script type='text/javascript'> alert('Logged in!')</script>";

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
    <link rel="stylesheet" href="login_styling.css">
    <title>Log In</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-left">
                <a href="startup.html">
                    <img src="logo.png" style="width: 50px;">
                </a>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="startup.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="box" style="float: inline-start;">
        <img src="login.png" style="width: 200px; height: 200px; margin-left: 60px; margin-top: 40px;">
        <h2
            style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white;">
            Welcome Back!</h2>
    </div>
    <div class="card" style="float: inline-start;">
        <form method = "POST" >
            <h2 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white;">Login Page</h2>
            <input type="text" placeholder="Email ID" id = "email" name = "em">
            <input type="password" placeholder="Password" style= "margin-top: 0px;" name="pass">
            <button name = "login_user"
                style="margin-top: 0px; font-size: large; font-family:Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Log
                In</button>
            <a href="signup.php" style = "padding-left: 45px">Don't have an account? Click here</a>
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