<?php
	session_start();
?>
<html>
	<head>
		<title>
			Delete Flight Schedule Details
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 215px
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 30px;
			}
			.form{
				margin: 10% 30%;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="admin_homepage.php">Home</a></li>
				<li><a href="admin_homepage.php">Dashboard</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<form class="form" action="delete_flight_handler.php" method="post">
			<h2>ENTER THE FLIGHT TO BE DELETED</h2>
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color:green; padding-left:20px;'>The Flight Schedule has been successfully deleted.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red; padding-left:20px;'>*Invalid Flight No./Departure Date, please enter again.</strong>
						<br>
						<br>";
				}
			?>
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Enter a valid Flight No.</td>
					<td class="fix_table">Enter the Departure Date</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="flight_no" required></td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Delete" name="Delete">
			</div>
		</form>
	</body>
</html>