<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $image = $_FILES["image"]["name"];
    $ret = "select UserName from tblstudent where UserName=:uname || StuID=:stuid";
    $query = $dbh->prepare($ret);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() == 0) {

      $extension = substr($image, strlen($image) - 4, strlen($image));
      $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
      if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
      } else {
        $image = md5($image) . time() . $extension;
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
        $sql = "update tblstudent set Image: image where ID=:eid";
        $query = $dbh->prepare($sql);

        $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->execute();
        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
          echo '<script>alert("Student has been added.")</script>';
          echo "<script>window.location.href ='add-students.php'</script>";
        } else {
          echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
      }
    } else {

      echo "<script>alert('Username or Student Id  already exist. Please try again');</script>";
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Add Students</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div class="container-scroller">
      <?php include_once('includes/header.php'); ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Students</h4>

                    <form class="forms-sample" method="post" enctype="multipart/form-data">

                      </div>
                        <label for="exampleInputName1">Student Photo</label>
                        <input type="file" name="image" value="" class="form-control" required='true'>
                        <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                      </div>
                     

                    </form>
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