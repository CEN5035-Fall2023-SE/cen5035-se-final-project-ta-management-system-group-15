<?php
include('../includes/db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $from_location = $_POST["from_location"];
    $to_location = $_POST["to_location"];
    $price = $_POST["price"];
    $status = $_POST["status"];

    // Insert data into the database
    $sql = "INSERT INTO oneway (from_location, to_location, price, status) VALUES ('$from_location', '$to_location', '$price', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful - show an alert and redirect
        echo "<script>
            alert('Data inserted successfully!');
            window.location.href = '../oneway.php';
        </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
} else {
    // Handle invalid requests, if any
    header("Location: error.php"); // Redirect to an error page
}
?>
