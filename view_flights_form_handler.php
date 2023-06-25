<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Flights
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
				<li><a href="home_page.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<h2>AVAILABLE FLIGHTS</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$origin=$_POST['origin'];
				$destination=$_POST['destination'];
				$dep_date=$_POST['dep_date'];	
				$no_of_pass=$_POST['no_of_pass'];
				$class=$_POST['class'];
			
				if($destination == $origin){
					echo'<script type="text/JavaScript">alert("Enter valid origin and destination");</script>';
				}

				
				$_SESSION['no_of_pass']=$no_of_pass;
				$_SESSION['class']=$class;
				$count=1;
				$_SESSION['count']=$count;
				$_SESSION['journey_date']=$dep_date;
				require_once('Database Connection file/mysqli_connect.php');
				if($class=="economy")
				{
					$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,economy_price FROM flight_details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_economy>='$no_of_pass' ORDER BY  departure_time";
					$flightno_query = "SELECT flight_no FROM flight_details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_economy>='$no_of_pass' ORDER BY  departure_time";
					$flightno_result = mysqli_query($dbc,$flightno_query);
					$flightno_fetch = mysqli_fetch_assoc($flightno_result);
					$result = mysqli_query($dbc,$query);
					$fetch = mysqli_fetch_assoc($result);
					$_SESSION['flight_no'] = $flightno_fetch["flight_no"];
					if(mysqli_num_rows($result)==0)
					{
						echo "<h3>No flights are available !</h3>";
					}
					else
					{
						echo "<form action=\"book_tickets2.php\" method=\"post\">";
						echo "<table cellpadding=\"10\"";
						echo "<tr><th>Flight No.</th>
						<th>Origin</th>
						<th>Destination</th>
						<th>Departure Date</th>
						<th>Departure Time</th>
						<th>Arrival Date</th>
						<th>Arrival Time</th>
						<th>Price(Economy)</th>
						<th>Select</th>
						</tr>";
						foreach($result as $row) {
        					echo "<tr>";
        					echo"<td>".$row["flight_no"]."</td>";
        					echo"<td>".$row["from_city"]."</td>";
							echo"<td>".$row["to_city"]."</td>";
							echo"<td>".$row["departure_date"]."</td>";
							echo"<td>".$row["departure_time"]."</td>";
							echo"<td>".$row["arrival_date"]."</td>";
							echo"<td>".$row["arrival_time"]."</td>";
							echo"<td>&#x20b9;".$row["economy_price"]."</td>";
							echo "<td><input type=\"radio\" name=\"select_flight\" value=\"" . $flightno_fetch["flight_no"] . "\" required></td>";
        					echo"</tr>";
    					}
    					echo "</table> <br>";
    					echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    					echo "</form>";
    				}
				}
				else if($class="business")
				{
					$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,business_price FROM flight_details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_business>='$no_of_pass' ORDER BY  departure_time";
					$flightno_query = "SELECT flight_no FROM flight_details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_business>='$no_of_pass' ORDER BY  departure_time";
					$flightno_result = mysqli_query($dbc,$flightno_query);
					$flightno_fetch = mysqli_fetch_assoc($flightno_result);
					$result=mysqli_query($dbc,$query);
					$fetch = mysqli_fetch_assoc($result);
					$_SESSION['flight_no'] = $flightno_fetch["flight_no"];
				
					if(mysqli_num_rows($result)==0)
					{
						echo "<h3>No flights are available !</h3>";
					}
					else
					{
						echo "<form action=\"book_tickets2.php\" method=\"post\">";
						echo "<table cellpadding=\"10\"";
						echo "<tr><th>Flight No.</th>
						<th>Origin</th>
						<th>Destination</th>
						<th>Departure Date</th>
						<th>Departure Time</th>
						<th>Arrival Date</th>
						<th>Arrival Time</th>
						<th>Price(Business)</th>
						<th>Select</th>
						</tr>";
						foreach($result as $row) {
        					echo "<tr>";
        					echo"<td>".$row["flight_no"]."</td>";
        					echo"<td>".$row["from_city"]."</td>";
							echo"<td>".$row["to_city"]."</td>";
							echo"<td>".$row["departure_date"]."</td>";
							echo"<td>".$row["departure_time"]."</td>";
							echo"<td>".$row["arrival_date"]."</td>";
							echo"<td>".$row["arrival_time"]."</td>";
							echo"<td>&#x20b9;".$row["business_price"]."</td>";
							echo "<td><input type=\"radio\" name=\"select_flight\" value=\"" . $flightno_fetch["flight_no"] . "\" required></td>";
        					echo"</tr>";
    					}
    					echo "</table> <br>";
    					echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    					echo "</form>";
    				}
				mysqli_close($dbc);
			}
		}
			else
			{
				echo "Search request not received";
			}
		?>
	</body>
</html>