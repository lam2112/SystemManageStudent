<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {
  // Code for deletion
  if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "delete from tblstudent where ID=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'manage-students.php'</script>";
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Search Students</title>
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
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post">
                      <div class="form-group">
                        <strong>Search Student:</strong>

                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search by Student ID">
                      </div>

                      <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                    </form>
                    <div class="d-sm-flex align-items-center mb-4">


                      <?php
                      if (isset($_POST['search'])) {

                        $sdata = $_POST['searchdata'];
                      ?>
                        <h4 align="center">Result against "<?php echo $sdata; ?>" keyword </h4>
                    </div>
                    <div class="table-responsive border rounded p-1">

                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Student ID</th>
                            <th class="font-weight-bold">Student Class</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Student Email</th>
                            <th class="font-weight-bold">Admissin Date</th>
                            <th class="font-weight-bold">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                          } else {
                            $pageno = 1;
                          }
                          // Formula for pagination
                          $no_of_records_per_page = 5;
                          $offset = ($pageno - 1) * $no_of_records_per_page;
                          $ret = "SELECT ID FROM tblstudent";
                          $query1 = $dbh->prepare($ret);
                          $query1->execute();
                          $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                          $total_rows = $query1->rowCount();
                          $total_pages = ceil($total_rows / $no_of_records_per_page);
                          $sql = "SELECT tblstudent.StuID,tblstudent.ID as sid,tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Section from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.StuID like '$sdata%' LIMIT $offset, $no_of_records_per_page";
                          $query = $dbh->prepare($sql);
                          $query->execute();
                          $results = $query->fetchAll(PDO::FETCH_OBJ);

                          $cnt = 1;
                          if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                              <tr>

                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($row->StuID); ?></td>
                                <td><?php echo htmlentities($row->ClassName); ?> <?php echo htmlentities($row->Section); ?></td>
                                <td><?php echo htmlentities($row->StudentName); ?></td>
                                <td><?php echo htmlentities($row->StudentEmail); ?></td>
                                <td><?php echo htmlentities($row->DateofAdmission); ?></td>
                                <td>
                                  <div><a href="edit-student-detail.php?editid=<?php echo htmlentities($row->sid); ?>"><i class="icon-eye"></i></a>
                                    || <a href="manage-students.php?delid=<?php echo ($row->sid); ?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a></div>
                                </td>
                              </tr><?php
                                    $cnt = $cnt + 1;
                                  }
                                } else { ?>
                            <tr>
                              <td colspan="8"> No record found against this search</td>

                            </tr>
                        <?php }
                              } ?>
                        </tbody>
                      </table>
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