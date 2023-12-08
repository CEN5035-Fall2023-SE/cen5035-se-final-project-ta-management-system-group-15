<?php
// Your database connection code
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $comment = $_POST["score"]; // Assuming you want to update the 'comment' column

    // Update the comment in the database
    $updateQuery = "UPDATE teacher_assistance_applications SET comment = '$comment' WHERE id = $id";

    if ($conn->query($updateQuery) === TRUE) {
        // Comment updated successfully, redirect to score.php
        header("Location: score.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error updating comment: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
