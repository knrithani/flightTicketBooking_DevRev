<?php
	session_start();
?>
<html>
	<head>
		<title>Submit Payment Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Pay_Now']))
			{
				$no_of_pass=$_SESSION['no_of_pass'];
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$pnr=$_SESSION['pnr'];
				$payment_id=$_SESSION['payment_id'];
				$total_amount=$_SESSION['total_amount'];
				$payment_date=$_SESSION['payment_date'];
				$payment_mode=$_POST['payment_mode'];
				$customer_id = $_SESSION['user_id'];				

				require_once('Database Connection file/mysqli_connect.php');
				if($class=='economy')
				{
					$query="UPDATE flight_details SET seats_economy=seats_economy-'$no_of_pass' WHERE flight_no='$flight_no' AND departure_date='$journey_date'";
					$query2 = "UPDATE ticket_details SET booking_status='CONFIRM',payment_id='$payment_id' WHERE flight_no='$flight_no' AND customer_id='$customer_id'";
					$result2 = mysqli_query($dbc, $query2);
					$result = mysqli_query($dbc, $query);
				}
				else if($class=='business')
				{
					$query="UPDATE flight_details SET seats_business=seats_business-'$no_of_pass' WHERE flight_no='$flight_no' AND departure_date='$journey_date'";
					$query2 = "UPDATE ticket_details SET booking_status='CONFIRM' WHERE flight_no='$flight_no' AND customer_id='$customer_id'";
					$result = mysqli_query($dbc, $query);
					$result2 = mysqli_query($dbc, $query2);
				}
			
				if($result && $result2)
				{
					echo "Successfully Updated Seats<br>";

					$insert_query="INSERT INTO payment_details(payment_id,pnr,payment_date,payment_amount,payment_mode) VALUES ('$payment_id','$pnr','$payment_date','$total_amount','$payment_mode')";
					$insert_result = mysqli_query($dbc,$insert_query);
					if($insert_result)
					{
						echo "Successfully Updated Payment Details<br>";
						header('location:ticket_success.php');
					}
					else
					{
						echo "Submit Error";
					}
				}
				else
				{
					echo "Submit Error";
				}
				mysqli_close($dbc);
			}
			else
			{
				echo "Payment request not received";
			}
		?>
	</body>
</html>