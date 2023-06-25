<?php
	session_start();
?>
<html>
	<head>
		<title>
			Welcome Customer
		</title>
		<link rel="stylesheet" type="text/css" href="css/customer_hp_style.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div class="container">
			<div>
				<ul>
					<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
					<li><a href="customer_homepage.php">Home</a></li>
					<li><a href="home_page.php">About Us</a></li>
					<li><a href="home_page.php">Contact Us</a></li>
					<li><a href="logout_process.php">Logout</a></li>
					<li><img src="images/user1.png" height="50px" style="margin-left: 450px;"></li>
					<?php echo"<h1 style='font-size:25px; color:white; float: right; padding:10px 15px 15px 15px;'>$_SESSION[login_user]<h1>";?>
				</ul>
			</div>
			<table cellpadding="5" class="box">

				<tr>
					<td><a href="book_tickets.php">Book Flight Tickets</a>
					</td>
				</tr>
				<tr>
					<td><a href="view_booked_tickets.php">View Booked Flight Tickets</a>
					</td>
				</tr>
				<tr>
					<td><a href="cancel_booked_tickets.php">Cancel Booked Flight Tickets</a>
					</td>
				</tr>
			</table>			
		</div>

	</body>
</html>