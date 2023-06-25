<?php
	session_start();
?>
<html>
	<head>
		<title>
			Ticket Booking Successful
		</title>
		<style>

		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/success_style.css"/>
	</head>
	<body>
		<div class="container">
			<div>
				<ul>
					<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
					<li><a href="customer_homepage.php">Home</a></li>
					<li><a href="customer_homepage.php">Dashboard</a></li>
					<li><a href="home_page.php">About Us</a></li>
					<li><a href="home_page.php">Contact Us</a></li>
					<li><a href="logout_process.php">Logout</a></li>
				</ul>
			</div>
			<div class="content">
				<h2>BOOKING SUCCESSFUL</h2><br><br>
				<h3>Your payment of &#x20b9; <?php echo $_SESSION['total_amount']; ?> has been received.<br><br> Your PNR is <strong><?php echo $_SESSION['pnr'];?></strong>. Your tickets have been booked successfully.</h3>
			</div>
		</div>

	</body>
</html>