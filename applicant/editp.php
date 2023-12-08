<?php 
session_start();
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TA Assistance</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Font Awesome CSS link for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>

</style>
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
    <?php include('includes/nav.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include('includes/sidenav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="container score-container">
    <h1>Profile Data <span style="color:red"><?php echo $full_name ?></span></h1>
    <form>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $full_name ?>" readonly>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" value="<?php echo $user_email ?>"readonly>
      </div>
     <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="number">Phone Number:</label>
        <input type="tel" class="form-control" id="number" placeholder="Enter your phone number" value="<?php echo $number ?>" readonly> 
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">State:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $courses ?>" readonly>
      </div>
      </div>
     </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">State:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $state ?>" readonly>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">City:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $city ?>" readonly>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">Experience:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $exp ?>" readonly>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">ZNumber:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $hall ?>" readonly>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="name">Country:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $country ?>" readonly>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="status">Status:</label>
        <input readonly type="text" class="form-control" id="status" placeholder="Enter your status" value="<?php 
        
        if($status == 0){
            echo"Not Accepted";
        }
        else{
            echo "Accepted";
        }
        ?>">
      </div>
      </div>
    </div>
   
 
    </form>
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

