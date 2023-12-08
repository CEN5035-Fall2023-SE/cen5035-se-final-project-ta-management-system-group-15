<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Teacher Assistance</title>
    <style>
        /* Center the hero section vertically */
        .center-vertically {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include('nav.php'); ?>
<br><br>
<!-- Hero Section -->



<div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-6">
        <h2 class="mt-4">Teaching Assistance Application Form</h2>
        <form action="submit_form.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="number">Number:</label>
                <input type="tel" class="form-control" id="number" name="number" required>
            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="Experience">Experience:</label>
                <input type="text" class="form-control"  name="experience" required>
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control"  name="contry" required>
            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="state">State :</label>
                <input type="text" class="form-control" name="state" required>
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="city">City :</label>
                <input type="text" class="form-control"  name="city" required>
            </div>
                </div>
            </div>
           
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
    </div>
    <div class="col-md-6">
    <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox" name="ta_at_north_university">
                <label class="form-check-label" for="checkbox">TA at North University</label>
            </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
                <label for="resume">Resume:</label>
                <input type="file" class="form-control-file" id="resume" name="resume">
            </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
    </div>
</div>
            <div class="form-group">
                <label for="courses">Courses of a Department:</label>
                <select class="form-control" id="courses" name="courses[]" multiple>
          <?php
       include('db.php');
          $sql = "SELECT name FROM courses";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
              }
          }

          $conn->close();
          ?>
        </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
        <div class="col-md-5">
            <img src="img/main.jpeg" alt="Teacher Assistance Image" class="img-fluid" width="100%">
        </div>
        <!--Image -->
       
    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
