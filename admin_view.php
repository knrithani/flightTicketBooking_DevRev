<?php
	session_start();
?>
<html>
	<head>
		<title>
			Admin View
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0% 15.8%
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/admin_view_style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="admin_homepage.php">Home</a></li>
				<li><a href="admin_homepage.php">Dashboard</a></li>
				<li><a href="logout_handler.php">Logout</a></li>
			</ul>
		</div>
		<div class="container">
			<div class="form">
				<form action="admin_view_handler.php" method="post">
					<h3>VIEW LIST OF BOOKED TICKETS FOR A FLIGHT</h3><br><br><br>
					<div>
						<table cellpadding="5">
							<tr>
								<td class="fix_table">Enter the Flight No.</td>
								<td class="fix_table">Enter the Departure Date</td>
							</tr>
							<tr>
								<td class="fix_table"><input type="text" name="flight_no" required></td>
								<td class="fix_table"><input type="date" name="departure_date" required></td>
							</tr>
						</table>
						<br>
						<br>
						<input type="submit" value="Submit" name="Submit">
					</div>
				</form>					
			</div>
		</div>

	</body>
</html>