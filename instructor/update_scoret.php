
<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $editedScore = $_POST['score'];

    // Update the score in the MySQL table
    $sql = "UPDATE teacher_assistance_applications SET score = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $editedScore, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Rating updated successfully!"); window.location.href = "score.php";</script>';
            exit();
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

            <?php
include('../db.php');
session_start();

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_email"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
} else {
   
}



?>
