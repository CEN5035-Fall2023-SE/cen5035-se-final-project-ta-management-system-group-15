

<?php 


include('../includes/db.php');

// Insert data into the database
// ... (previous code)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get invoice data from the form
    $invoiceNumber = $_POST["invoice_number"];
    $invoiceDate = $_POST["invoice_date"];
    $buyerGSTNumber = $_POST["buyer_gst_number"];
    $buyerAddress = $_POST["buyer_address"];
    $buyername = $_POST["buyer_name"];
    $contact = $_POST["contact"];
    $cus_code = $_POST["cus_code"];

    $sno = $_POST["sno"];
    $productNames = $_POST["product_name"];
    $quantities = $_POST["quantity"];
    $rates = $_POST["rate"];
   
    $sgst = $_POST["tax1"];
    $cgst = $_POST["tax1"];
    $taxes = $sgst + $cgst;
    $amounts = $_POST["amount"];

    // Calculate total amount
    $totalAmount = array_sum($amounts);
}

// Insert invoice data into the invoices table
$sqlUpdateInvoice = "UPDATE customerdata 
                   SET invoice_number = ?, invoice_date = ?, gst = ?, Location = ?,  total_amount = ? 
                   WHERE ID = ?";

// Prepare and execute the SQL statement for updating invoice data
$stmtUpdateInvoice = $conn->prepare($sqlUpdateInvoice);

if ($stmtUpdateInvoice === false) {
    die("Error in the SQL query: " . $conn->error);
}

// Bind parameters for $stmtUpdateInvoice
$stmtUpdateInvoice->bind_param("sssssi", $invoiceNumber, $invoiceDate, $buyerGSTNumber, $buyerAddress,  $totalAmount, $cus_code);

if ($stmtUpdateInvoice->execute()) {
    echo "Invoice data updated successfully.";
} else {
    echo "Error: " . $stmtUpdateInvoice->error;
}


$stmtUpdateInvoice->close();

// ... (Rest of your code)


// Get the invoice ID of the inserted invoice

$productNames = [];

// Populate $productNames with data from the form (assuming 'product_name' is an )
if (isset($_POST['product_name'])) {
    $productNames = $_POST['product_name'];
}
// Insert product data into the products table
$sqlInsertProduct = "INSERT INTO products (invoice_id, product_name,  quantity, rate, sgst, cgst, tax, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Define $stmtInsertProduct before the loop
$stmtInsertProduct = $conn->prepare($sqlInsertProduct);

foreach ($productNames as $key => $productName) {
    // Bind parameters and execute the query
    $stmtInsertProduct->bind_param("isdddddd", $cus_code, $productName,  $quantities[$key], $rates[$key], $sgst[$key], $cgst[$key], $taxes[$key], $amounts[$key]);

    if (!$stmtInsertProduct->execute()) {
        echo "Error inserting product data: " . $stmtInsertProduct->error;
    }
}


// Close the database connection

$stmtInsertProduct->close();


// ... (rest of the code)

// ... (previous code for saving data to the database)

ob_start(); // Start output buffering

// ... (previous code for saving data to the database)
// ... (previous code for saving data to the database)



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <div class="container">
        <h3 style="text-align: center;">Invoice</h3>
        <p><b>IRN :</b>RYB8644VHJHGBNBJGT755788GB BGG776</p>
        <p><b>ACK NO:</b>78756756545354686754</p>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray; width: 100%;" class="table">
            <tr>
                <td rowspan="3" style="font-size:10px"><b>SRINIVASA OIL MERCHANTS </b><br>AMALAPURAM<br>GSTIN/UN : GYGUB656767VGH <br>State Name : Andhra Pradesh <br>Email : loehbjbh@gmail.com</td>
                <td><b>Invoice No</b><br><?php echo $invoiceNumber?></td>
                <td><b>Dated</b><br><?php echo  $invoiceDate ?></td>
            </tr>
            <tr>
        <td><b>Delievery date</b><br><?php echo  $invoiceDate ?></td>
        <td><b>Mode Of Payment</b><br><?php echo $modeOfPayment?></td>
        </tr>
        <tr>
        <td><b>reference </b><br><?php echo $reference ?></td>
        <td><b>reference Date</b><br></td>
        </tr>
        <tr>
        <td rowspan="3">Consignment (Ship to)<br><b>SRINIVASA OIL MERCHANTS </b><br>AMALAPURAM<br>GSTIN/UN : GYGUB656767VGH <br>State Name : Andhra Pradesh <br>Email : loehbjbh@gmail.com</td>
        
            <td><b>Buyers order No</b><br></td>
        <td><b>dated</b><br><?php echo  $invoiceDate ?></td>
        
        </tr>
        <tr>
        <td><b>dispatch Doc No</b><br>979767</td>
        <td><b>Delievery Note date</b><br><?php echo $deliveryNote ?></td>
        </tr>
        <tr>
        <td><b>Dispatched Through</b><br>Bike</td>
        <td><b>designation</b><br><?php echo $destination ?></td>
        </tr>
        <tr>
        <td rowspan="2">Buyed (Buyyer Details to)<br><b><?php echo $buyername?> </b><br><?php echo $buyerAddress?><br>GSTIN/UN : <?php echo $buyerGSTNumber?> <br>State Name : <?php echo $buyerState?> <br>Email : </td>
        <td><b>Bill Of Landing</b><br>Bike</td>
        <td><b>Motor vehicle No</b><br><?php echo $motorVehicleNumber ?></td>
        </tr>
        <tr>
        <td colspan="2"><b>Terms Of Delivary</b><br>this is the terms of delievery</td>
        </tr>
        </table>
        <table class="table" cellspacing="0" cellpadding="1" border="1" style="border-color:rgb(13, 13, 13); width: 100%;">
            <tr>
                <th style="width: 5%;">S.no</th>
                <th style="width: 30%;">Product Name</th>
                <th style="width: 10%;">HSN</th>
                <th style="width: 10%;">Quantity</th>
                <th style="width: 10%;">Rate</th>
                <th>SGST</th>
                <th>CGST</th>
                <th>Amount</th>
            </tr>';
    
    <?php
    foreach ($sno as $key => $value) {
        ?><tr>
                    <td><?php echo $sno[$key] ?></td>
                    <td><?php echo $productNames[$key] ?></td>
                    <td><?php echo $hsnSAC[$key] ?></td>
                    <td><?php echo $quantities[$key] ?></td>
                    <td><?php echo $rates[$key] ?></td>
                    <td><?php echo $sgst[$key] ?></td>
                    <td><?php echo $cgst[$key] ?></td>
                    <td><?php echo $amounts[$key] ?></td>
                </tr>
    <?php } ?>
    <tr>
    <td></td>
    <td><b>Total Amount</b></td>
    <td></td>
    <td><?php  echo array_sum($quantities)?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b><?php  echo array_sum($amounts) ?></b></td>
    </tr>
    
    </table>
    
    </div>
    
    <table cellspacing="0" cellpadding="1" border="1" style="border-color:black; width: 100%;" class="table">
    <tr>
    
        <th rowspan="2">HSN/SAC</th>
        <th rowspan="2">Taxable Value</th>
        <th colspan="2">Central Tax</th>
        <th colspan="2">State Tax</th>
        <th rowspan="2">Total Tax Amount</th>
    </tr>
    <tr>
        <th>Rate</th>
        <th>Amount</th>
        <th>Rate</th>
        <th>Amount</th>
    
    </tr><?php
    foreach ($sno as $key => $value) {
        ?><tr>
                  
                    <td><?php echo $hsnSAC[$key] ?></td>
                    <td> <? echo ($quantities[$key] * $rates[$key]); ?></td>
                    <td><?php echo $cgst[$key] ?></td>
                    <td><?php echo (($quantities[$key] * $rates[$key] * $cgst[$key])/100) ?></td>
                    
                    <td><? echo $sgst[$key] ?></td>
                    <td><?php echo (($quantities[$key] * $rates[$key] * $sgst[$key])/100) ?></td>
                   
                
                    <td><?php echo  (($quantities[$key] * $rates[$key] * $cgst[$key])/100)+(($quantities[$key] * $rates[$key] * $sgst[$key])/100) ?> '</td>
                </tr>
    
    <?php  }?>
        </table><br>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:black; width: 100%;" class="table">
        <tr>
        <td><b>Company Pan : </b>Ajgud87</td>
      <td><b>For Srinivaasa Oils And Merchants</b></td>
        </tr>
        <tr>
        <td><b>Declaration:</b><br>We declare that this invoice shows the actual price of the goods described by and that all particulars are true.</td>
        </tr>
        </table>
        <button onclick="printPage()">Print Page</button>
    
    <script>
        function printPage() {
            window.print(); // Trigger the browser's print dialog
        }
    </script>
</body>
</html>