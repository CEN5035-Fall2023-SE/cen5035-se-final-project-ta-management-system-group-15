
<?php
session_start();

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_email"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
} else {
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jhanavi Cabs</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
      <?php include('includes/sidenav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        <?php  
        include('includes/db.php');
$yu = $_GET['id'];
$result = $conn->query("SELECT * FROM hourly_cabs WHERE id = $yu");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>  
        <!-- Form Starts Here -->
        <div class="container ">
        <h2>View Hourly Cabs Details</h2>
        <form action="controls/update_hourly_cabs.php" method="POST">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="car_name">Car Name:</label>
                <input type="text" class="form-control" id="car_name" name="car_name" value="<?php echo $row['car_name']; ?>" required>
                <input type="text" class="form-control"  name="id" value="<?php echo $row['id']; ?>" hidden required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="passengers_number">Passengers Number:</label>
                <input type="number" class="form-control" id="passengers_number" name="passengers_number" value="<?php echo $row['passengers_number']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="luggage_number">Luggage Number:</label>
                <input type="number" class="form-control" id="luggage_number" name="luggage_number" value="<?php echo $row['luggage_number']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="hours">Hours:</label>
                <input type="number" class="form-control" id="hours" name="hours" value="<?php echo $row['hours']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="kilometers">Kilometers:</label>
                <input type="number" step="0.01" class="form-control" id="kilometers" name="kilometers" value="<?php echo $row['kilometers']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="extra_charge_per_km">Extra Charge per Kilometer:</label>
                <input type="number" step="0.01" class="form-control" id="extra_charge_per_km" name="extra_charge_per_km" value="<?php echo $row['extra_charge_per_km']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="extra_min_charge">Extra Minute Charge:</label>
                <input type="number" step="0.01" class="form-control" id="extra_min_charge" name="extra_min_charge" value="<?php echo $row['extra_min_charge']; ?>" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" value="<?php echo $row['total_price']; ?>" required>
            </div>

            </div>
          </div>

           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php

}

} else {
echo "No records found";
}
$conn->close();

?>
    </div>
        <!-- Form Ends Here --->
       
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#" target="_blank">Jhanavi Cabs </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="#" target="_blank">CRM   </a> Jhanavi Cabs</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

