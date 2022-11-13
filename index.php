<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>

<head>
  <title>Home Page</title>

  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body>
  <?php include_once('includes/header.php'); ?>
  <div class="banner">
    <div class="container">
      <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider">
            <li>
              <h3>Student Management System</h3>
              <p>Registered Students can Login Here</p>
              <div class="readmore">
                <a href="user/login.php">Student Login<i class="glyphicon glyphicon-menu-right"> </i></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('includes/footer.php'); ?>
</body>

</html>