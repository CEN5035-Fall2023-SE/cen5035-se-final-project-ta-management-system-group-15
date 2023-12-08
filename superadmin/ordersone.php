<?php
include('includes/db.php');
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
  
    <!-- partial:partials/_navbar.html -->
  
      <!-- partial:partials/_sidebar.html -->
      <?php include('includes/sidenav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        
        <!-- Table Starts Here -->
        <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">OneWay Orders</h1>
<a href="#" class="btn btn-info" data-toggle="modal" data-target="#createWayModal">Create One Way order</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">One Way Cabs Info</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                    <th>Date_Time</th>
                    <th>From</th>
                        <th>To</th>
                        <th>car</th>
                        <th>CustomerCode</th>
                        <th>Name</th>
                        <th>Mobile</th>
                       
                        <th>Status</th>
                        <th>Action</th>
                      
                      
                    </tr>
                </thead>
                <tfoot>
                    
                    <tr>
                    <th>Date_Time</th>
                    <th>From</th>
                        <th>To</th>
                        <th>car</th>
                        <th>CustomerCode</th>
                        <th>Name</th>
                        <th>Mobile</th>
                       
                        <th>Status</th>
                        <th>Action</th>
                    
                </tfoot>
                <tbody>
                    <?php  

$result = $conn->query("SELECT * FROM orders_oneway ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
                    <tr>
                    <td><?php echo $row['datetime']; ?></td>
                        <td><?php echo $row['from_location']; ?></td>
                        <td><?php echo $row['to_location']; ?></td>
                        <td><?php echo $row['car']; ?></td>
                        <td><?php echo $row['customer_code']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                       
                       
                  

                        <td>
    <?php if ($row['status'] == "Pending"): ?>
        <a href="controls/activeorderone.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to Update this record?')" class="btn btn-danger">Not Done</a>
    <?php else: ?>
        <a href="#" class="btn btn-success">Done</a>
    <?php endif; ?>
</td>
                        <td>
                        <a href="deleteorderone.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-info">Delete</a>
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
        <h5 class="modal-title" id="createWayModalLabel">Create Order For One Way</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your form goes here -->
        <form action="controls/insert_orders_oneway.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="from_location">From Location:</label>
                <input type="text" class="form-control" id="from_location" name="from_location" required>
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="to_location">To Location:</label>
                <input type="text" class="form-control" id="to_location" name="to_location" required>
            </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                <label for="car">Car:</label>
                <input type="text" class="form-control" id="car" name="car" required>
            </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                <label for="customer_code">Customer Code:</label>
                <input type="text" class="form-control" id="customer_code" name="customer_code" required>
            </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
                        </div>
            </div>
          
          
         
           
          
         
            
           
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
  <!-- Add Bootstrap JS and jQuery scripts here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

