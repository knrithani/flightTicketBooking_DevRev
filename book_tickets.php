<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Flights
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/booking_style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="home_page.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<div class="container">
			<form class="form" action="view_flights_form_handler.php" method="post">
				<h2 style="text-align: center;">SEARCH FOR AVAILABLE FLIGHTS</h2><br><br>
				<table cellpadding="5">
					<tr>
						<td class="fix_table">Enter the Origin</td>
						<td class="fix_table">Enter the Destination</td>
					</tr>
					<tr>
						<td class="fix_table">
							<select name="origin" id="origins">
								<option value="Chennai">Chennai</option>
								<option value="Bangalore">Bangalore</option>
								<option value="Mumbai">Mumbai</option>
								<option value="Delhi">Delhi</option>
								<option value="Indore">Indore</option>
							</select>
						</td>
						<td class="fix_table">
							<select name="destination" id="destinations">
								<option value="Chennai">Chennai</option>
								<option value="Bangalore">Bangalore</option>
								<option value="Mumbai">Mumbai</option>
								<option value="Delhi">Delhi</option>
								<option value="Indore">Indore</option>
							</select>			
						</td>
					</tr>
				</table>
				<br>
				<table cellpadding="5">
					<tr>
						<td class="fix_table">Enter the Departure Date</td>
						<td class="fix_table">Enter the No. of Passengers</td>
					</tr>
					<tr>
						<td class="fix_table"><input type="date" name="dep_date" min=
							<?php 
								$todays_date=date('Y-m-d'); 
								echo $todays_date;
							?> 
							max=
							<?php 
								$max_date=date_create(date('Y-m-d'));
								date_add($max_date,date_interval_create_from_date_string("90 days")); 
								echo date_format($max_date,"Y-m-d");
							?> required></td>
						<td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
					</tr>
				</table>
				<br>
				<table cellpadding="5">
					<tr>
						<td class="fix_table">Enter the Class</td>
					</tr>
					<tr>
						<td class="fix_table">
							<select name="class">
	  							<option value="economy">Economy</option>
	  							<option value="business">Business</option>
	  						</select>
	  					</td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Search for Available Flights" name="Search">
			</form>			
		</div>
	</body>
</html>