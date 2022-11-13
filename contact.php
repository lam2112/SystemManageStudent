<?php
session_start();
include('includes/dbconnection.php');
?>
<!doctype html>
<html>

<head>
	<title>Contact Us</title>

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
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.11.0.min.js"></script>

</head>

<body>
	<?php include_once('includes/header.php'); ?>
	<div class="banner banner5">
		<div class="container">
			<h2>Contact</h2>
		</div>
	</div>

	<div class="contact">
		<div class="container">
			<div class="contact-info">
				<h3 class="c-text">Feel Free to contact with us!!!</h3>
			</div>

			<div class="contact-grids">
				<div class="col-md-4 contact-grid-left">
					<h3>Address :</h3>
					<p>Song Rach Khai Luong, Tan An, Ninh Kieu, Can Tho
					</p>
				</div>
				<div class="col-md-4 contact-grid-middle">
					<h3>Phones :</h3>
					<p>0393571571
					</p>
				</div>
				<div class="col-md-4 contact-grid-right">
					<h3>E-mail :</h3>
					<p>SYSmail@gmail.com
					</p>
				</div>
			</div>
		</div>
	</div>

	<?php include_once('includes/footer.php'); ?>
</body>

</html>