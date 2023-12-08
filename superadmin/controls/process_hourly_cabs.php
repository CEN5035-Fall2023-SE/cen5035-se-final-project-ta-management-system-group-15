<?php
include('../includes/db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $car_name = $_POST["car_name"];
    $passengers_number = $_POST["passengers_number"];
    $luggage_number = $_POST["luggage_number"];
    $hours = $_POST["hours"];
    $kilometers = $_POST["kilometers"];
    $extra_charge_per_km = $_POST["extra_charge_per_km"];
    $extra_min_charge = $_POST["extra_min_charge"];
    $total_price = $_POST["total_price"];

    // Insert data into the "hourly cabs" table
    $sql = "INSERT INTO hourly_cabs (car_name, passengers_number, luggage_number, hours, kilometers, extra_charge_per_km, extra_min_charge, total_price) 
            VALUES ('$car_name', '$passengers_number', '$luggage_number', '$hours', '$kilometers', '$extra_charge_per_km', '$extra_min_charge', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful - show an alert and redirect
        echo "<script>
            alert('Data inserted successfully!');
            window.location.href = '../hour.php'; // Redirect to the appropriate page
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
