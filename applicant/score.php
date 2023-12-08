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
    /* Styles for the score container */
.score-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
}

/* Styles for the animated score value */
.score {
  display: flex;
  align-items: center;
  font-size: 40px;
  color: #007BFF;
  position: relative;
  animation: fadeIn 1s ease-in-out;

  /* Additional animations for a pulsating effect */
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.score-value {
  font-weight: bold;
  margin-right: 10px;
}

.max-score {
  font-size: 20px;
  color: #777;
}

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
    
      <div class="score-container">
      <h1 style="text-align: center;">My Rating</h1>
  <div class="score">
    <span class="score-value" id="score-value"><?php echo $score ?>/10</span>
  
  </div><br>
  <h3 style="text-align: center;">Comments About Me</h3>
  <?php
// Assuming you have a database connection
include('../db.php');

// Assuming $id is the variable containing the user's ID
 // You may need to adjust this depending on how you obtain the user's ID

// Fetch the comment from the users table
$query = "SELECT comment FROM teacher_assistance_applications WHERE id = $user_id";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Access the comment
    $comment = $row['comment'];
?>

<h4 class="score" id="score-value"><?php echo $comment; ?></h4>

<?php
 
    $result->close();
} else {
    // Handle the case where the query failed
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
</div>


      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  const scoreValue = document.getElementById('score-value');

  // Function to update the score value dynamically
  function updateScore(newScore) {
    scoreValue.textContent = newScore;
  }

  // Example: You can use setTimeout to simulate updating the score after a delay
 
});
</script>

       
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

