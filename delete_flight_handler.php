<?php
	session_start();
?>
<html>
	<head>
		<title>Delete Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Delete']))
			{
				$flight_no=$_POST['flight_no'];	
				$departure_date=$_POST['departure_date'];
				require_once('Database Connection file/mysqli_connect.php');
				$query="DELETE FROM flight_details WHERE flight_no='$flight_no' AND departure_date='$departure_date'";
				$result = mysqli_query($dbc,$query);
				if($result)
				{
					echo "Successfully Deleted";
					header("location: delete_flight.php?msg=success");
				}
				else
				{
					echo "Submit Error";
					header("location: delete_flight.php?msg=failed");
				}
			}
			else
			{
				echo "Delete request not received";
			}
		?>
	</body>
</html>