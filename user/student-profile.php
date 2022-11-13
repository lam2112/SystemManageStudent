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

    <title>View Students Profile</title>
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

                    <table border="1" class="table table-bordered mg-b-0">

                      <?php
                      $sid = $_SESSION['sturecmsstuid'];
                      $sql = "SELECT tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.StudentClass,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.FatherName,tblstudent.MotherName,tblstudent.ContactNumber,tblstudent.AltenateNumber,tblstudent.Address,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Section from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.StuID=:sid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;

                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                          <!-- Hiển thị bảng thông tin -->
                          <tr align="center" class="table-warning">
                            <td colspan="4" style="font-size:20px;color:blue">
                              Students Details</td>
                          </tr>

                          <tr class="table-info">
                            <th>Student Name</th>
                            <td><?php echo $row->StudentName; ?></td>
                            <th>Student Email</th>
                            <td><?php echo $row->StudentEmail; ?></td>
                          </tr>
                          <tr class="table-warning">
                            <th>Student Class</th>
                            <td><?php echo $row->ClassName; ?> <?php echo $row->Section; ?></td>
                            <th>Gender</th>
                            <td><?php echo $row->Gender; ?></td>
                          </tr>
                          <tr class="table-danger">
                            <th>Date of Birth</th>
                            <td><?php echo $row->DOB; ?></td>
                            <th>Student ID</th>
                            <td><?php echo $row->StuID; ?></td>
                          </tr>
                          <tr class="table-success">
                            <th>Father Name</th>
                            <td><?php echo $row->FatherName; ?></td>
                            <th>Mother Name</th>
                            <td><?php echo $row->MotherName; ?></td>
                          </tr>
                          <tr class="table-primary">
                            <th>Contact Number</th>
                            <td><?php echo $row->ContactNumber; ?></td>
                            <th>Altenate Number</th>
                            <td><?php echo $row->AltenateNumber; ?></td>
                          </tr>
                          <tr class="table-progress">
                            <th>Address</th>
                            <td><?php echo $row->Address; ?></td>
                            <th>User Name</th>
                            <td><?php echo $row->UserName; ?></td>
                          </tr>
                          <tr class="table-info">
                            <th>Profile Pics</th>
                            <td><img src="../admin/images/<?php echo $row->Image; ?>"></td>
                            <th>Date of Admission</th>
                            <td><?php echo $row->DateofAdmission; ?></td>
                          </tr>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                    </table>
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