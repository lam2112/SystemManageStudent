<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {
  // Code for deletion
  if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "delete from tblclass where ID=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'manage-class.php'</script>";
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Manage Class</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <div class="container-scroller">
      <?php include_once('includes/header.php'); ?>

      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Class</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Classes</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Class Name</th>
                            <th class="font-weight-bold">Section</th>
                            <th class="font-weight-bold">Creation Date</th>
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

                          $no_of_records_per_page = 15;
                          $offset = ($pageno - 1) * $no_of_records_per_page;
                          $ret = "SELECT ID FROM tblclass";
                          $query1 = $dbh->prepare($ret);
                          $query1->execute();
                          $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                          $total_rows = $query1->rowCount();
                          $total_pages = ceil($total_rows / $no_of_records_per_page);
                          $sql = "SELECT * from tblclass LIMIT $offset, $no_of_records_per_page";
                          $query = $dbh->prepare($sql);
                          $query->execute();
                          $results = $query->fetchAll(PDO::FETCH_OBJ);

                          $cnt = 1;
                          if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                              <tr>

                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($row->ClassName); ?></td>
                                <td><?php echo htmlentities($row->Section); ?></td>
                                <td><?php echo htmlentities($row->CreationDate); ?></td>
                                <td>
                                  <div><a href="edit-class-detail.php?editid=<?php echo htmlentities($row->ID); ?>"><i class="icon-eye"></i></a>
                                    || <a href="manage-class.php?delid=<?php echo ($row->ID); ?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a></div>
                                </td>
                              </tr><?php $cnt = $cnt + 1;
                                  }
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