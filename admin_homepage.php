<?php
	session_start();
?>
<html>
	<head>
		<title>
			Welcome Administrator
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/admin_hp_style.css"/>
	</head>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="admin_homepage.php">Home</a></li>
				<li><a href="admin_homepage.php">Dashboard</a></li>
				<li><a href="logout_processs.php">Logout</a></li>
			</ul>
		</div>
		<div class="container">
			<div class="content">
				<br>
				<h2>Welcome Administrator!</h2><br><br><br>
				<table cellpadding="5" cellspacing="30">
					<tr>
						<td class="admin_func"><a href="admin_view.php">View List of Booked Tickets for a Flight</a>
						</td>
					</tr>
					<tr>
						<td class="admin_func"><a href="add_flight.php">Add Flight Schedule Details</a>
						</td>
					</tr>
						<td class="admin_func"><a href="delete_flight.php">Delete Flight Schedule Details</a>
						</td>
					</tr>
				</table>				
			</div>
		</div>

	</body>
</html>