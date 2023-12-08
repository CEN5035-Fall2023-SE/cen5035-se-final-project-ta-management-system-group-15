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
  <title>Teacher Assistance | Super Admin</title>
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
  <style>
    .content-wrapper {
  background-image: url('../img/university.png') !important; /* Replace 'path/to/your/image.jpg' with the actual path to your image */
 /* This will make sure the image covers the entire background */
  background-position: center !important; /* Center the background image */
  background-repeat: no-repeat !important;
 background-size:contain !important;

}
.table-responsive{
  background-color: #fff !important;
}
.score-container{
  background-color: #fff !important;
}
  </style>
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
  
      <!-- partial:partials/_sidebar.html -->
      <?php include('includes/sidenav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h1 class="h3 mb-2 text-gray-800">View All Aplicants</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TA Applicants Info</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                    <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>

                        <th>Before At North university</th>
                        <th>Rating</th>
                        <th>View User</th>
                        <th>Resume</th>
                        <th>Status</th>
               
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php  
include('../db.php');
$result = $conn->query("SELECT * FROM teacher_assistance_applications ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php if($row['ta_at_north_university'] == 1){
                            echo "Yes";

                        }else{
                            echo "No";
                        } ?></td>
                        <td><?php 
                        if($row['score'] == ''){
                            echo "0/10";
                        }else{
echo $row['score'].'/10';
                        }
                        ?></td>
                        <td>
    <a href="viewp.php?id=<?php echo $row['id'] ?>" class="btn btn-info"> View Profile<!-- Image 1 -->
       
    </a></td>
                        <td>
    <a href="#" onclick="openImagePopUp('../<?php echo $row['resume']; ?>')" class="btn btn-info"> View<!-- Image 1 -->
       
    </a>
</td>

<!-- JavaScript function to open the pop-up and provide the download option -->
<script>
function openImagePopUp(imagePath) {
    var popUpWindow = window.open(imagePath, 'Image Pop-up', 'width=600, height=400');
    var downloadLink = document.createElement('a');
    downloadLink.href = imagePath;
    downloadLink.download = 'downloaded_image.jpg'; // Specify the download file name
    downloadLink.textContent = 'Download Image';

    popUpWindow.document.body.appendChild(downloadLink);
}
</script>

                        <td>

                        <?php if ($row['status'] == 0): ?>
        <a class="btn btn-danger">Not Accepted</a>
    <?php elseif ($row['status'] == 1): ?>
        <a class="btn btn-primary">Pending</a>
    <?php else: ?>
        <a href="#" class="btn btn-success">Accepted</a>
    <?php endif; ?>



</td>
                        <td>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-warning">Delete</a>
                        </td>
                        
                        
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
            
        </div>
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

