<?php
include("../includes/db.php"); // Make sure to provide the correct path to your connection.php file

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the UPDATE query
    $query = "UPDATE outstation SET status = 'Inactive' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            // Update successful, redirect to the page where the record list is displayed
            header("Location: ../outstation.php"); // Replace 'record_list.php' with the page where you list all records
            exit();
        } else {
            // Error occurred during the update
            echo "Error: Unable to update the record.";
        }
    } else {
        // Error in preparing the query
        echo "Error: Unable to prepare the UPDATE query.";
    }

    mysqli_stmt_close($stmt);
}



?>