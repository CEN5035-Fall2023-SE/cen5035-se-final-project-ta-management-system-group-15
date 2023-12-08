<?php
// Include your database connection file
include('../../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Prepare and execute the INSERT query
    $query = "INSERT INTO courses (name, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $description);

        if (mysqli_stmt_execute($stmt)) {
            // Insertion successful - show an alert and redirect
            echo '<script>alert("Course data inserted successfully!"); window.location.href = "../courses.php";</script>';
            exit();
        } else {
            // Error occurred during insertion
            echo 'Error: Unable to insert the course data. ' . mysqli_error($conn);
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
