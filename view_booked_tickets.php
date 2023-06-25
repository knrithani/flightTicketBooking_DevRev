<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Booked Tickets
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
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse; 
			 margin-left: 350px;
			}
			tr{
			 border: solid thin;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="customer_homepage.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
				<?php echo"<h1 style='font-size:25px; color:white; float: right; padding:0px 15px 0px 15px;'>$_SESSION[login_user]<h1>";?>

			</ul>
		</div>
		<h2>VIEW BOOKED FLIGHT TICKETS</h2>
		<h3><center><u>Upcoming Trips</u></center></h3>
		<?php
			$todays_date=date('Y-m-d');
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			$customer_id=$_SESSION['user_id'];
			require_once('Database Connection file/mysqli_connect.php');
			$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM ticket_details where customer_id='$customer_id' AND journey_date>='$todays_date' AND booking_status='CONFIRM' ORDER BY  journey_date";
			$result = mysqli_query($dbc,$query);
			$rowcount=mysqli_num_rows($result);
			$fetch = mysqli_fetch_assoc($result);
			if($rowcount<1)
			{
				echo "<h3><center>No upcoming trips!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
				<th>Class</th>
				<th>Booking Status</th>
				<th>No. of Passengers</th>
				<th>Payment ID</th>
				</tr>";
				foreach($result as $row) {
        			echo "<tr>";
        			echo"<td>".$row['pnr']."</td>";
        			echo"<td>".$row['date_of_reservation']."</td>";
					echo"<td>".$row['flight_no']."</td>";
					echo"<td>".$row['journey_date']."</td>";
					echo"<td>".$row['class']."</td>";
					echo"<td>".$row['booking_status']."</td>";
					echo"<td>".$row['no_of_passengers']."</td>";
					echo"<td>".$row['payment_id']."</td>";
        			echo"</tr>";
    			}
    			echo "</table> <br>";
			}
			echo "<br><h3 class=\"set_nice_size\"><center><u>Completed Trips</u></center></h3>";

			$query2="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details WHERE customer_id='$customer_id' AND journey_date<'$todays_date' AND journey_date>='$thirty_days_before_date' ORDER BY  journey_date";
			$result2 = mysqli_query($dbc,$query2);
			$rowcount2 = mysqli_num_rows($result2);
			$fetch = mysqli_fetch_assoc($result);
			if($rowcount2<1)
			{
				echo "<h3><center>No trips completed in the past 30 days!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
				<th>Class</th>
				<th>Booking Status</th>
				<th>No. of Passengers</th>
				<th>Payment ID</th>
				</tr>";
				foreach($result2 as $row2){
        			echo "<tr>";
        			echo"<td>".$row2['pnr']."</td>";
        			echo"<td>".$row2['date_of_reservation']."</td>";
					echo"<td>".$row2['flight_no']."</td>";
					echo"<td>".$row2['journey_date']."</td>";
					echo"<td>".$row2['class']."</td>";
					echo"<td>".$row2['booking_status']."</td>";
					echo"<td>".$row2['no_of_passengers']."</td>";
					echo"<td>".$row2['payment_id']."</td>";
        			echo"</tr>";
    			}
    			echo "</table> <br>";
			}
			mysqli_close($dbc);
		?>
	</body>
</html>