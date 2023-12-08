

<?php
session_start(); // Start the PHP session

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('../db.php'); 

    // Get data from the login form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user data from the database based on the provided email
    $stmt = $conn->prepare("SELECT id, email, name, number, password, status, score, country, state, city, hall, courses, exp FROM teacher_assistance_applications WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

  // ...

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $row["password"])) {
        // Password is correct, create a session and store user information
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["full_name"] = $row["name"];
        $_SESSION["number"] = $row["number"];
        $_SESSION["score"] = $row["score"];
        $_SESSION["status"] = $row["status"];
        $_SESSION["country"] = $row["country"];
        $_SESSION["state"] = $row["state"];
        $_SESSION["city"] = $row["city"];
        $_SESSION["hall"] = $row["hall"];
        $_SESSION["exp"] = $row["exp"];
        $_SESSION["courses"] = $row["courses"]; // Add this line to set full_name in the session

        // Redirect to a protected page after successful login
        header("Location: index.php");
        exit();
    } else {
        // Incorrect password
        $login_error = "Incorrect email or password.";
    }
} else {
    // User with the provided email does not exist
    $login_error = "Incorrect email or password.";
}

// ...


    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Assistance Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">
    <style>
        body {
            background: url('../img/main.jpeg') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 30px;
            margin: 100px auto;
            max-width: 400px;
            text-align: center;
            animation: fadeInUp 1s; /* Animation from the 'animate.css' library */
        }

        .login-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .password-icon {
            position: absolute;
            top: 0;
            right: 10px;
            cursor: pointer;
        }

        /* Add hover effect to password icon */
        .password-icon:hover {
            color: #007bff; /* Change the color when hovering */
        }
    </style>
</head>
<body>
    <?php include('nav2.php');?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-container">
                    <h1 class="login-heading">TA Management System <br>Applicant<span style="color:green;">Login</span> </h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text password-icon" onclick="togglePassword()">
                                        <i id="password-icon" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($login_error) && !empty($login_error)) {
                            echo '<div class="alert alert-danger">' . $login_error . '</div>';
                        }
                        ?>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var passwordIcon = document.getElementById("password-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
