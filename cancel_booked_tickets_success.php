<?php
	session_start();
?>
<html>
	<head>
		<title>
			Cancel Booked Tickets
		</title>
		<style>
			.container{
				height: 100%;
				width: 100%;
				background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0.5,0,0,0)),url(images/flight3.jpg);
				background-position: centre;
				background-size: cover;
				position: absolute;

			}

			.box{
				height: 300px;
				width: 520px;
				position: relative;
				margin: 150px auto;
				background: white;
				opacity: 0.9;
				padding: 5px;
			}
			h2,h3{
				text-align: center;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="home_page.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<div class="container">
			<div class="box">
				<h2>CANCEL BOOKED TICKETS</h2>
				<h3>Your ticket has been cancelled successfully.<br><br>Your amount of &#x20b9; <?php echo $_SESSION['refund_amount']?> will be refunded to your bank account (Cancellation charge of 25% of your ticket amount has been deducted).
				</h3>
				<br>				
			</div>
		</div>

	</body>
</html>