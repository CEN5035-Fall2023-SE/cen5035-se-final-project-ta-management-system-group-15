<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $editedScore = $_POST['editedScore'];

    // Update the score in the MySQL table
    $sql = "UPDATE teacher_assistance_applications SET score = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $editedScore, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "success";
        } else {
            echo "error";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
