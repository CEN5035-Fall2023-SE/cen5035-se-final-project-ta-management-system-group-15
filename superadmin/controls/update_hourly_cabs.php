<?php
include('../includes/db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $car_name = $_POST["car_name"];
    $passengers_number = $_POST["passengers_number"];
    $luggage_number = $_POST["luggage_number"];
    $hours = $_POST["hours"];
    $kilometers = $_POST["kilometers"];
    $extra_charge_per_km = $_POST["extra_charge_per_km"];
    $extra_min_charge = $_POST["extra_min_charge"];
    $total_price = $_POST["total_price"];

    // Check if the "id" is also submitted in the form, assuming you have a hidden input field for it
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Update data in the database
        $sql = "UPDATE hourly_cabs 
                SET car_name = '$car_name', passengers_number = '$passengers_number', luggage_number = '$luggage_number', hours = '$hours',
                kilometers = '$kilometers', extra_charge_per_km = '$extra_charge_per_km', extra_min_charge = '$extra_min_charge',
                total_price = '$total_price' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            // Update successful - show an alert and redirect
            echo "<script>
                alert('Data updated successfully!');
                window.location.href = '../hour.php';
            </script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Handle the case when the "id" is not provided
        echo "Error: Missing ID parameter";
    }

    $conn->close(); // Close the database connection
} else {
    // Handle invalid requests, if any
    header("Location: error.php"); // Redirect to an error page
}
?>
