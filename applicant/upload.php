<?php
// Include your database connection file
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $email = $_POST['email'];

    // Define the target directory where the uploaded file will be stored
    $targetDirectory = "../answers/";

    // Get the name of the uploaded file
    $originalFileName = basename($_FILES["question_paper"]["name"]);

    // Define the full path to the target directory and file
    $targetFilePath = $targetDirectory . $originalFileName;

    // Check if the file has been successfully uploaded
    if (move_uploaded_file($_FILES["question_paper"]["tmp_name"], $targetFilePath)) {
        // File uploaded successfully

        // Update the `question_paper_filename` column for the specific record
        $query = "UPDATE question_papers SET answer_filename = ?, status = 1 WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $originalFileName, $email);

            if (mysqli_stmt_execute($stmt)) {
                // Update successful - show an alert and redirect
                echo '<script>alert("Assignment Updated successfully!"); window.location.href = "assignment.php";</script>';
                exit();
            } else {
                // Error occurred during the update
                echo 'Error: Unable to update the record. ' . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            // Error in preparing the query
            echo 'Error: Unable to prepare the UPDATE query. ' . mysqli_error($conn);
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
