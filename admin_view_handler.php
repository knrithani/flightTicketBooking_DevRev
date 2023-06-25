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
				<li><a href="admin_homepage.php">Home</a></li>
				<li><a href="admin_homepage.php">Dashboard</a></li>
				<li><a href="logout_handler.php">Logout</a></li>
			</ul>
		</div>
		<h2>LIST OF BOOKED TICKETS</h2>
		<?php
			if(isset($_POST['Submit']))
			{
				$flight_no=$_POST['flight_no'];
				$date=$_POST['departure_date'];
				
				require_once('Database Connection file/mysqli_connect.php');
				$query = "SELECT pnr,date_of_reservation,class,no_of_passengers,payment_id,customer_id FROM ticket_details where flight_no='$flight_no' and journey_date='$date' and booking_status='CONFIRM' ORDER BY class";
				$result = mysqli_query($dbc,$query);
				$count = mysqli_num_rows($result);
				$fetch = mysqli_fetch_assoc($result);
				if($count<1)
				{
					echo "<h3>No booked tickets information is available!</h3>";
				}
				else
				{
					echo "<table cellpadding=\"10\">";
					echo "<tr><th>PNR</th>
					<th>Date of Reservation</th>
					<th>Class</th>
					<th>No. of Passengers</th>
					<th>Payment ID</th>
					<th>Customer ID</th>
					</tr>";
					foreach($result as $row) {
						echo "<tr>";
        				echo"<td>".$row['pnr']."</td>";
        				echo"<td>".$row['date_of_reservation']."</td>";
						echo"<td>".$row['class']."</td>";
						echo"<td>".$row['no_of_passengers']."</td>";
						echo"<td>".$row['payment_id']."</td>";
						echo"<td>".$row['customer_id']."</td>";
        				echo"</tr>";
    				}
    				echo "</table> <br>";
    			}
				mysqli_close($dbc);
			}
			else
			{	
				echo "Submit request not received";
			}
		?>
	</body>
</html>