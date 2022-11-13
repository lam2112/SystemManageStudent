<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsstuid'] == 0)) {
  header('location:logout.php');
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./css/style.css">

  </head>

  <body>
    <div class="container-scroller">

      <?php include_once('includes/header.php'); ?>
      <div class="container-fluid page-body-wrapper">
        
        <?php include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">

                  <!-- khu vực chính dasboard -->
                  <span class="card-body d-lg-flex align-items-center">
                    <p class="mb-lg-0">You be should check your pro file offen</p>
                    <a href="student-profile.php" class="btn btn-warning purchase-button btn-sm my-1 my-sm-0 ml-auto">Check Profile</a>

                  </span>
                </div>
              </div>
            </div>
          </div>

          <?php include_once('includes/footer.php'); ?>
        </div>

      </div>

    </div>

    <script src="vendors/js/vendor.bundle.base.js"></script>

  </body>

  </html>
 <?php 
} 
 ?> 