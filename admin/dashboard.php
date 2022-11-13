<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container-scroller">
      <?php include_once('includes/header.php'); ?>
      <div class="container-fluid page-body-wrapper">

      <?php include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row report-inner-cards-wrapper">

                      <!-- Các bảng thống kê -->
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php
                          $sql1 = "SELECT * from  tblclass";
                          $query1 = $dbh->prepare($sql1);
                          $query1->execute();
                          $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                          $totclass = $query1->rowCount();
                          ?>
                          <span class="report-title">Total Class</span>
                          <h4><?php echo htmlentities($totclass); ?></h4>
                          <a href="manage-class.php"><span class="report-count"> View Classes</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>

                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php
                          $sql2 = "SELECT * from  tblstudent";
                          $query2 = $dbh->prepare($sql2);
                          $query2->execute();
                          $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                          $totstu = $query2->rowCount();
                          ?>
                          <span class="report-title">Total Students</span>
                          <h4><?php echo htmlentities($totstu); ?></h4>
                          <a href="manage-students.php"><span class="report-count"> View Students</span></a>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-user"></i>
                        </div>
                      </div>

                    </div>

                  </div>
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

  </html><?php }  ?>