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
                        <th>View Profile</th>
                        <th>Resume</th>
                       
                        <th>Status</th>
                        <th>Change_Status</th>
                    
                    </tr>
                </thead>
              
                <tbody>
                    <?php  
include('../db.php');
$result = $conn->query("SELECT * FROM teacher_assistance_applications  ORDER BY id DESC");

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
                         <td>
    <a href="viewp.php?id=<?php echo $row['id'] ?>" class="btn btn-info"> View Profile<!-- Image 1 -->
       
    </a></td>
                        <td>
    <a href="#" onclick="openImagePopUp('../<?php echo $row['resume']; ?>')" class="btn btn-dark"> View <!-- Image 1 -->
       
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
        <a class="btn btn-info">Pending</a>
    <?php else: ?>
        <a href="#" class="btn btn-success">Accepted</a>
    <?php endif; ?>
</td>

<td>

<?php $id = $row['id']; ?>
    <form action="activeuser.php" method="POST">
    <div class="form-group">
        <label for="score">Select Status: </label>
        <select class="form-control" id="score" name="score">
        <option value="<?php echo $row['comment']; ?>">Select  <i class="mdi mdi-book menu-icon"></i></option>
            <option value="0">Not Accepted</option>
            <option value="1">Pending</option>
            <option value="2">Accepted</option>
   
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn btn-warning">Change Status</button>
</form>


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

