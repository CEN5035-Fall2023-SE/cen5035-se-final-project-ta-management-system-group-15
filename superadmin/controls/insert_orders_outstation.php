<?php
// Include your database connection file
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $datetime = $_POST['datetime'];
    $days = $_POST['days'];
    $customer_code = $_POST['customer_code'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $status = $_POST['status']; // Assuming 'status' comes from the form

    // Prepare and execute the INSERT query
    $query = "INSERT INTO orders_outstation (from_location, to_location, datetime, days, customer_code, name, number, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $from_location, $to_location, $datetime, $days, $customer_code, $name, $number, $status);

        if (mysqli_stmt_execute($stmt)) {
            // Insertion successful - show an alert and redirect
            echo '<script>alert("Data inserted successfully!"); window.location.href = "../ordersoutstation.php";</script>';
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
