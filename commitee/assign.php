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
  <title>Teacher Assistance | Commitee Members</title>
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
<h1 class="h3 mb-2 text-gray-800">Assignments</h1>
<a href="#" class="btn btn-info" data-toggle="modal" data-target="#createWayModal">Assign Assignment To Applicant</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assignments From Applicants Info</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                    <th>Email</th>
                    <th>View Question paper</th>
                    <th>Description</th>
                    <th>Submission Time</th>
                    <th>Status</th>
                        <th>Action</th>
                      
                      
                    </tr>
                </thead>
              
                <tbody>
                    <?php  

$result = $conn->query("SELECT * FROM question_papers ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
                    <tr>
                    <td><?php echo $row['email']; ?></td>
                        <td><a class="btn btn-success" target="_blank" href="../uploads/<?php echo $row['question_paper_filename']; ?>">View Paper</a></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['submitting_time']; ?></td>
                        <td>
    <?php if ($row['status'] == "1"): ?>
        <a href="../answers/<?php echo $row['answer_filename']; ?>" target="_blank" class="btn btn-info">View Answer</a>
    <?php else: ?>
        <a href="#" class="btn btn-danger">Pending Not Submitted</a>
    <?php endif; ?>
</td>
                       
                        <td>
                        <a href="deleteassign.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-info">Delete</a>
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
           
            <!-- Modal -->
<div class="modal fade" id="createWayModal" tabindex="-1" role="dialog" aria-labelledby="createWayModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createWayModalLabel">Assign Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your form goes here -->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- Email Selection -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Select User</label>
                        <select class="form-control" id="email" name="email" required>
                            <?php
                                // Include your database connection file
                                include('../db.php');

                                // Fetch emails from the teacher_assistance_applications table
                                $sql = "SELECT t.email
                                FROM teacher_assistance_applications t
                                LEFT JOIN question_papers q ON t.email = q.email
                                WHERE q.email IS NULL;
                                ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $email = $row["email"];
                                        echo "<option value='$email'>$email</option>";
                                    }
                                } else {
                                    echo "<option value=''>No emails available</option>";
                                }

                                // Close the database connection
                                $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Upload Question Paper -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="question_paper">Upload Question Paper</label>
                        <input type="file" class="form-control" id="question_paper" name="question_paper" required>
                    </div>
                </div>
            </div>
            <!-- Hints and Suggestions (Description) -->
            <div class="form-group">
                <label for="description">Hints and Suggestions</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <!-- Submitting Time -->
            <div class="form-group">
                <label for="submitting_time">Submitting Time</label>
                <input type="text" class="form-control" id="submitting_time" name="submitting_time" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

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

