<?php
session_start();
include('includes/dbconnection.php');
?>
<!doctype html>
<html>

<head>
	<title>Student Management System || About Us Page</title>
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
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

	
</head>

<body>
	<?php include_once('includes/header.php'); ?>
	<div class="banner banner5">
		<div class="container">
			<h2>About</h2>
		</div>
	</div>

	<div class="about">
		<div class="container">
			<div class="about-info-grids">
				<div class="col-md-5 abt-pic">
					<img src="images/abt.jpg" class="img-responsive" alt="" />
				</div>
				<div class="col-md-7 abt-info-pic">
				<div style="text-align: start;"><span style="font-size: 26px;">This is a system that helps teachers monitor students and manage personal information provided by students. With us, you will have the necessary skills for the future.</span><br></div>

				</div>

			</div>

		</div>
	</div>
	<?php include_once('includes/footer.php'); ?>
</body>

</html>