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
  <title>Teacher Assistance | Commitee member</title>
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
        <div class="content-wrapper background-section">
          
          <div class="row score-container">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    <h2>Welcome TA Assistance Commitee Member, <br><span style="color:red; font-size:40px;"><?php echo $_SESSION['full_name'] ?></span></h2>
                    
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                
                 
                </div>
              </div>
            </div>
          </div>
     <!--     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi 	mdi-clipboard-account icon-lg me-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Totoal Customers</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">3</h5>
                              </a>
                            
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-inr me-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="me-2 mb-0">577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-engine-outline me-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Complaint</small>
                            <h5 class="me-2 mb-0">9</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi 	mdi-close-circle icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Pending</small>
                            <h5 class="me-2 mb-0">2</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Completed</small>
                            <h5 class="me-2 mb-0">3</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                 
                   
                  </div>
                </div>
              </div>
            </div>
          </div> -->
       
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

