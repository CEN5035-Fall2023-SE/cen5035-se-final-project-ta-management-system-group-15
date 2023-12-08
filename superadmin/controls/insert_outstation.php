<?php
// Include your database connection file
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];

    // You can also validate the data here

    // SQL query to insert data into the "outstation" table
    $sql = "INSERT INTO outstation (name, status) VALUES ('$name', 'Active')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful - show an alert and redirect
        echo "<script>
            alert('Data inserted successfully!');
            window.location.href = '../outstation.php'; // Replace 'outstation.php' with the page where you list outstation records
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Handle invalid requests, if any
    header("Location: error.php"); // Redirect to an error page
}

// Close the database connection
$conn->close();
?>
