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
          <!-- Assignment Starts Here-->

         

<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                      <th>Email</th>
                    <th>Question Paper</th>
                        <th>Description</th>
                        <th>Submission Time</th>

                        <th>Sent Time</th>
                    </tr>
                </thead>
                <tfoot>
                    
                    <tr>
                    <th>Email</th>
                    <th>Question Paper</th>
                        <th>Description</th>
                        <th>Submission Time</th>

                        <th>Sent Time</th>
                    </tr>
                    
                </tfoot>
                <tbody>
                <?php
        $emailr = $_SESSION['user_email'];
include('../db.php');
$result = $conn->query("SELECT * FROM question_papers WHERE email='$user_email'");
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}


if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {


          ?>
          <tr>
                        <td><?php echo $row['email']; ?></td>
                        <td>
    <a href="../uploads/<?php echo $row['question_paper_filename']; ?>" target="_blank" class="btn btn-info"> View Assignment<!-- Image 1 -->
       
    </a>
</td>
                        <td><?php echo $row['description']; ?></td>
                     
                        <td><?php echo $row['submitting_time']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                     

<!-- JavaScript function to open the pop-up and provide the download option -->
                     
                     
                        
                    </tr>
                    
<tr>
<br>



<br><br>
<?php

if($row['status']==0){
?>
 <div class="container">
        <h1 class="mt-4">Upload Your Answer Sheet</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="file">Select a file:</label>
                <input type="file" class="form-control-file" name="question_paper" id="file" accept=".pdf, .doc, .docx">
                <input type="text" value="<?php echo $user_email ?>" hidden readonly class="form-control" name="email" >
                <small class="form-text text-muted">Accepted file formats: PDF, DOC, DOCX.</small>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <br>



<br><br>
<?php


}else{
?>
<h1 style="color:green;">Assignment Submitted Succesfully</h1>

<?php
}
 ?>
</tr>
                    <?php

}

} else {
echo "No Assignments Found";
}
$conn->close();

?>
                </tbody>
        
            </table>
            
        </div>
    </div>
          <!--Assignment Ends Here -->
      
     
       
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

