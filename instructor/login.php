<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../db.php');

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, email, name, password FROM instructor WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            session_regenerate_id(); // Regenerate session ID for security
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_email"] = $row["email"];
            $_SESSION["full_name"] = $row["name"];
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Incorrect email or password.");</script>';
        }
    } else {
        echo '<script>alert("Incorrect email or password.");</script>';
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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .login-logo {
            margin-bottom: 20px;
        }
    </style>
</head>
<body><?php include('../nav2.php') ?><br><br><br>
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="login-container">
                    <div class="login-logo">
                       <h3> Instructor Login</h3><br><h6>TA Management System</h6>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required name="email" autocomplete="email">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" required name="password" autocomplete="current-password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="show-hide-password">
                                        <i class="fa fa-eye-slash" aria-hidden="true" id="password-icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Toggle password visibility
        $('#show-hide-password').click(function(){
            var passwordInput = $('#password');
            var passwordIcon = $('#password-icon');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    </script>
</body>
</html>
