<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
  $stuid = $_POST['stuid'];
  $password = md5($_POST['password']);

  //Đăng nhập bằng id hoặc tên
  $sql = "SELECT StuID,ID,StudentClass FROM tblstudent WHERE (UserName=:stuid || StuID=:stuid) and Password=:password";
  $query = $dbh->prepare($sql);

  $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();

  $results = $query->fetchAll(PDO::FETCH_OBJ);

  //set session and cookies để dăng nhập
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['sturecmsstuid'] = $result->StuID;
      $_SESSION['sturecmsuid'] = $result->ID;
      $_SESSION['stuclass'] = $result->StudentClass;
    }
    if (isset($_COOKIE["user_login"])) {
      setcookie("user_login", "");
      if (isset($_COOKIE["userpassword"])) {
        setcookie("userpassword", "");
      }
    }
    
    $_SESSION['login'] = $_POST['stuid'];

    //Điều hướng khi đăng nhập thành công
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  } else {

    //Thông báo khi nhập sai
    echo "<script>alert('Invalid Details');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Student Login Page</title>

  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">

              <!-- content -->
              <div class="brand-logo">
                <img src="images/logo.svg"> Login Student
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <form class="pt-3" id="login" method="post" name="login">
                <div class="form-group">
                  <!--lưu thông tin người  dùng vào cookie -->
                  <input type="text" class="form-control form-control-lg" placeholder="enter your student id or username" name="stuid" required="true" value="<?php if (isset($_COOKIE["user_login"])) {
                    echo $_COOKIE["user_login"];
                  } ?>">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="enter your password" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                    echo $_COOKIE["userpassword"];
                  } ?>">
                </div>
                
                <!-- nút đăng nhập -->
                <div class="mt-3">
                  <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                </div>

                <!-- nút quay về trang chủ -->
                <div class="mb-2 mt-4">
                  <a href="../index.php" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="icon-social-home mr-2"></i>Back Home </a>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>