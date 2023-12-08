<?php
// Database connection parameters
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer autoloader
require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';
ob_start();

// Function to generate a unique ID
function generateUniqueID() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $firstChar = $alphabet[rand(0, strlen($alphabet) - 1)];
    $digits = sprintf("%08d", rand(0, 99999999));
    return $firstChar . $digits;
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $exp = $_POST["experience"];
    $contry = $_POST["contry"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $ta_at_north_university = isset($_POST["ta_at_north_university"]) ? 1 : 0;
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password

    // Check if the user already exists
    $query = "SELECT * FROM teacher_assistance_applications WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User with this email already registered
        echo "<script>alert('User with this email already registered.')</script>";
        header("Location: register.php"); // Redirect to register.php
        exit(); // Make sure to exit after header redirect
    } else {
        // Save the uploaded file
        $resumeFolder = "resume/";
        if (!file_exists($resumeFolder)) {
            mkdir($resumeFolder, 0777, true);
        }

        $resumeFileName = $resumeFolder . $name . basename($_FILES["resume"]["name"]);

        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resumeFileName)) {
            // Process the selected courses
            $selectedCourses = isset($_POST["courses"]) ? implode(", ", $_POST["courses"]) : "";
            $uniqueID = generateUniqueID();
            // Insert the data into the database, including the courses
            $insertQuery = "INSERT INTO teacher_assistance_applications (name, number, email, ta_at_north_university, resume, password, courses, exp, country, state, city, hall) 
                            VALUES ('$name', '$number', '$email', $ta_at_north_university, '$resumeFileName', '$password', '$selectedCourses', '$exp', '$contry', '$state', '$city', '$uniqueID')";

            if ($conn->query($insertQuery) === TRUE) {
                // Application submitted successfully
                $user_mail = new PHPMailer(true);

                try {
                    $user_mail->SMTPDebug = 2;               // Enable verbose debug output (set to 2 for debugging)
        $user_mail->isSMTP();                    // Set mailer to use SMTP
        $user_mail->Host = 'smtp.gmail.com';      // Specify the main SMTP server for Gmail
        $user_mail->SMTPAuth = true;             // Enable SMTP authentication
        $user_mail->Username = 'teachingassistantmsystem@gmail.com';  // Your Gmail email address
        $user_mail->Password = 'onypsdmqjwzmqoup';          // Your Gmail app password
        $user_mail->SMTPSecure = 'tls';          // Enable TLS encryption; 'ssl' is also possible, but 'tls' is recommended
        $user_mail->Port = 587;                 // TCP port to connect to for TLS
        
        // Recipient for the user
        $user_mail->setFrom('noreply@example.com', 'Teaching Assistance');
        $user_mail->addAddress($email, $name);              // Add a recipient
        
        // Email content for the user
        $user_mail->isHTML(true);                                   // Set email format to HTML
        $user_mail->Subject = 'Successful Registration - Welcome to Teaching Assistance';
        $user_mail->Body    = "Dear $name,<br><br>
                              Congratulations! We are delighted to inform you that your registration with [Teaching Assistance] was completed successfully. Welcome to our growing community!<br><br>
                              Your registration details:<br>
                              Full Name: $name<br>
                              Email Address: $email<br>
                              Mobile number: $number<br>
                              ZNumber: $uniqueID<br>
                            ";

                    // Send the email to the user
                    $user_mail->send();
                    echo "Registration successful. A confirmation email has been sent to your email address.";
                    header("Location: confirm.html");
                    exit(); // Make sure to exit after header redirect

                } catch (Exception $e) {
                    echo "Registration successful, but the confirmation email to the user could not be sent. Please contact our support.";
                }

                header("Location: success.php"); // Redirect to success.php
                exit(); // Make sure to exit after header redirect

            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }

            // ... (the rest of your code)

        } else {
            echo "File upload failed.";
        }
    }
}

// Close the database connection
$conn->close();
ob_end_flush();

?>
