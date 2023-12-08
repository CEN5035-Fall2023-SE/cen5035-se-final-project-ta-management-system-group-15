<?php


session_start();

if (!isset($_SESSION["user_idd"]) || !isset($_SESSION["user_emaill"])) {
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
  <title>TA Management System | Commitee member</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../applicant/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../applicant/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../applicant/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../applicant/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../applicant/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
  
      <!-- partial:partials/_sidebar.html -->
      <?php include('includes/sidenav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="container">
        <h2>User Information Form</h2>
        <form>
            <div class="row score-container">
            <?php  
        include('../db.php');
$yu = $_GET['id'];
$result = $conn->query("SELECT * FROM teacher_assistance_applications WHERE id = $yu");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {


// Close the connection

?>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" readonly placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">ZNumber</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['hall']; ?>" readonly placeholder="Enter Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Enter Number" value="<?php echo $row['number']; ?>" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" readonly>
                    </div>
                </div>

                <!-- Repeat the above block for other fields -->

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="<?php echo $row['country']; ?>" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $row['state']; ?>" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $row['city']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Comment</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php echo $row['comment']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Course</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php echo $row['courses']; ?>" readonly>
                    </div>
                </div>
            </div>
<?php
}}else{
echo "No records found";
}

$conn->close();

?>
            <!-- Add a submit button here if needed -->
        </form>
        </div>
       
       
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      <?php include('includes/footer.php');  ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../applicant/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../applicant/vendors/chart.js/Chart.min.js"></script>
  <script src="../applicant/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../applicant/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../applicant/js/off-canvas.js"></script>
  <script src="../applicant/js/hoverable-collapse.js"></script>
  <script src="../applicant/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../applicant/js/dashboard.js"></script>
  <script src="../applicant/js/data-table.js"></script>
  <script src="../applicant/js/jquery.dataTables.js"></script>
  <script src="../applicant/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="../applicant/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

