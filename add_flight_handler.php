<?php
	session_start();
?>
<html>
	<head>
		<title>Add Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				
				$flight_no=trim($_POST['flight_no']);
				$origin=$_POST['origin'];
				$destination=$_POST['destination'];
				$dep_date=$_POST['dep_date'];
				$arr_date=$_POST['arr_date'];	
				$dep_time=$_POST['dep_time'];
				$arr_time=$_POST['arr_time'];
				$seats_eco=$_POST['seats_eco'];
				$seats_bus=$_POST['seats_bus'];
				$price_eco=$_POST['price_eco'];
				$price_bus=$_POST['price_bus'];
				
				require_once('Database Connection file/mysqli_connect.php');
				
				$query="INSERT INTO flight_details (flight_no,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,seats_economy,seats_business,economy_price,business_price) VALUES ('$flight_no','$origin','$destination','$dep_date','$arr_date','$dep_time','$arr_time','$seats_eco','$seats_bus','$price_eco','$price_bus')";
				$result = mysqli_query($dbc,$query);
				mysqli_close($dbc);
				if($result)
				{
					echo "Successfully Submitted";
					header("location: add_flight.php?msg=success");
				}
				else
				{
					echo "Submit Error";
					echo mysqli_error();
					header("location: add_flight.php?msg=failed");
				}
				
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>