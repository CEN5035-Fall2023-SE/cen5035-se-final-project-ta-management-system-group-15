<?php
// Include your database connection file
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $email = $_POST['email'];
    $description = $_POST['description'];
    $submittingTime = $_POST['submitting_time'];

    // Define the target directory where the uploaded file will be stored
    $targetDirectory = "../uploads/";

    // Get the name of the uploaded file
    $originalFileName = basename($_FILES["question_paper"]["name"]);

    // Define the full path to the target directory and file
    $targetFilePath = $targetDirectory . $originalFileName;

    // Check if the file has been successfully uploaded
    if (move_uploaded_file($_FILES["question_paper"]["tmp_name"], $targetFilePath)) {
        // File uploaded successfully

        // Prepare and execute the INSERT query
        $query = "INSERT INTO question_papers (email, description, submitting_time, question_paper_filename) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $email, $description, $submittingTime, $originalFileName);

            if (mysqli_stmt_execute($stmt)) {
                // Insertion successful - show an alert and redirect
                echo '<script>alert("Assignment Assigned successfully!"); window.location.href = "assign.php";</script>';
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
        // File upload failed
        echo 'Error: Unable to upload the file.';
    }
} else {
    // Handle invalid requests, if any
    header('Location: error.php'); // Redirect to an error page
}
?>
