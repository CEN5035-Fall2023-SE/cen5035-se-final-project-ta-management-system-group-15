<?php
// Include your database connection file
include('../../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare and execute the INSERT query
    $query = "INSERT INTO department_staff (name, number, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $number, $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            // Insertion successful - show an alert and redirect
            echo '<script>alert("Data inserted successfully!"); window.location.href = "../department.php";</script>';
            exit();
        } else {
            // Error occurred during insertion
            echo 'Error: Unable to insert the record. ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the query
        echo 'Error: Unable to prepare the INSERT query. ' . mysqli_error($conn);
    }
} else {
    // Handle invalid requests, if any
    header('Location: error.php'); // Redirect to an error page
}
?>
