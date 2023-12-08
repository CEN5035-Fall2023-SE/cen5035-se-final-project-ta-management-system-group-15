<?php
include('../db.php');
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
  <title>Teacher Assistance | Commitee Member</title>
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
          
        
        <!-- Table Starts Here -->
        <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Commitee Members</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Commitee Members Info</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                    <th>Name</th>
                    <th>Number</th>
                        <th>Email</th>
                      
                      
                      
                    </tr>
                </thead>
            
                <tbody>
                    <?php  

$result = $conn->query("SELECT * FROM commitee ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
                    <tr>
                    <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                       
                        
                        
                    </tr>

                    <?php

}

} else {
echo "No records found";
}
$conn->close();

?>
                </tbody>
        
            </table>
           
            <!-- Modal -->


        </div>
    </div>
</div>

</div>
        <!-- Table Ends Here --->
       
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      <?php include('includes/footer.php') ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

