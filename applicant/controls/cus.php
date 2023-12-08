<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['date'], $_POST['name'], $_POST['contact'], $_POST['location'])) {
        // Retrieve input data from the form
        $date = $_POST['date'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $location = $_POST['location'];
        $complaint = $_POST['complaint'];

        $message = "Hello Customer, This is the Notification Message from \n *Rudhra Generators*.\nWe noticed your complaint under the Name\n*$name* with the Contact Number *$contact*.\n On Date : *$date*\n Complaint : *$complaint*\nThank you, and have a Great day!";

        // Generate a unique customer code based on the provided criteria
        $first_letters = substr($name, 0, 2);
        $last_four_digits = substr($contact, -4);
        $customer_code = $last_four_digits;

        // Insert data into the customer table
        $sql = "INSERT INTO customers (date, name, contact, location, customer_code, complaint) VALUES ('$date', '$name', '$contact', '$location', '$customer_code', '$complaint')";

        if ($conn->query($sql) === TRUE) {
            $phone = "91" . $contact;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://18.234.4.124:3003/api/v1/messages',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode([
                    [
                        "recipient_type" => "individual",
                        "to" => $phone,
                        "type" => "text",
                        "text" => [
                            "body" => $message
                        ]
                    ]
                ]),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer dk_66e5b6c99776471983ef32ea22aff22f'
                ),
            ));

            $response = curl_exec($curl);

            if ($response === false) {
                echo "cURL Error: " . curl_error($curl);
            } else {
                echo '<script>var curlSuccess = true;</script>';
            }

            curl_close($curl);
        } else {
            // JavaScript alert for error and redirect
            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
            echo '<script>window.location = "../mancus.php";</script>';
        }
    } else {
        // JavaScript alert for incomplete form data and redirect
        echo '<script>alert("Incomplete form data. Please fill in all required fields.");</script>';
        echo '<script>window.location = "../mancus.php";</script>';
    }

    $conn->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests, you can add code here if needed.
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Handle PUT requests, you can add code here if needed.
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handle DELETE requests, you can add code here if needed.
} else {
    echo "Invalid request.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Sent</title>
</head>
<body>
    <script>
        window.onload = function() {
            if (typeof curlSuccess !== 'undefined' && curlSuccess) {
                alert("Message sent successfully!");
            } else {
                alert("An error occurred while sending the message.");
            }

            window.location = "../mancus.php";
        };
    </script>
</body>
</html>
