<?php
// Include your database connection file
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $from_location = $_POST['from_location'];
    $hour_id = $_POST['hour_id'];
    $customer_code = $_POST['customer_code'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $datetime = $_POST['datetime'];
    $status = 'Pending'; // Set the default status to 'Pending'

    // Prepare and execute the INSERT query
    $query = "INSERT INTO orders_hourly (from_location, hour_id, customer_code, name, number, datetime, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $from_location, $hour_id, $customer_code, $name, $number, $datetime, $status);

        if (mysqli_stmt_execute($stmt)) {
            // Insertion successful - show an alert and redirect
            echo '<script>alert("Data inserted successfully!"); window.location.href = "../ordershourly.php";</script>';
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
