<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection settings
    include('../includes/db.php');

    // Generate a unique customer code (you can customize this as needed)
    $customerCode = uniqid('CUST_');

    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $location = $_POST["location"];

    // Check if a customer with the same mobile number or customer code already exists
    $checkQuery = "SELECT * FROM users WHERE contact = '$contact' OR customer_code = '$customerCode'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // A customer with the same mobile number or customer code already exists, skip insertion
        echo "<script>
            alert('A customer with the same mobile number or customer code already exists. Data not inserted.');
            window.location.href = '../mancus.php';
        </script>";
    } else {
        // Process the uploaded files
        $id_proof1 = $name . '_' . $_FILES["id_proof1"]["name"];
        $id_proof2 = $name . '_' . $_FILES["id_proof2"]["name"];

        // Move the uploaded files to a designated directory
        $uploadDirectory = "../uploads/";
        move_uploaded_file($_FILES["id_proof1"]["tmp_name"], $uploadDirectory . $id_proof1);
        move_uploaded_file($_FILES["id_proof2"]["tmp_name"], $uploadDirectory . $id_proof2);

        // Insert customer data into the database
        $sql = "INSERT INTO users (customer_code, name, contact, location, id_proof1, id_proof2)
                VALUES ('$customerCode', '$name', '$contact', '$location', '$id_proof1', '$id_proof2')";

        if ($conn->query($sql) === TRUE) {
            // Insertion successful - show an alert and redirect
            echo "<script>
                alert('Customer data inserted successfully!');
                window.location.href = '../mancus.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle invalid requests, if any
    header("Location: error.php");
}
?>
