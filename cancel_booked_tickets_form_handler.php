<?php
	session_start();
?>
<html>
	<head>
		<title>
			Cancel Booked Tickets
		</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Cancel_Ticket']))
			{
				$pnr=$_POST['pnr'];
				require_once('Database Connection file/mysqli_connect.php');
				$todays_date=date('Y-m-d'); 
				$customer_id=$_SESSION['user_id'];

				$query="SELECT * from ticket_details WHERE pnr='$pnr' AND journey_date>='$todays_date'";
				
				$result = mysqli_query($dbc,$query);
				if(!$result)
				{
					mysqli_close($dbc);
					header("location: cancel_booked_tickets.php?msg=failed");
				}
				$query2="UPDATE ticket_details SET booking_status='CANCELED' WHERE pnr='$pnr' AND customer_id='$customer_id'";
				$result2 = mysqli_query($dbc,$query2);
				if($result2)
				{
					$query3="SELECT flight_no,journey_date,no_of_passengers,class FROM ticket_details WHERE pnr='$pnr'";
					$result3 = mysqli_query($dbc,$query3);
					$query4 = "SELECT 0.75*payment_amount AS refund FROM payment_details WHERE pnr='$pnr'";
					$result4 = mysqli_query($dbc,$query4);
					if($result3 && $result4)
					{
						$fetch1 = mysqli_fetch_assoc($result3);
						$fetch2 = mysqli_fetch_assoc($result4); 
						$_SESSION['refund_amount']=$fetch2['refund'];
						$class = $fetch1['class'];
						$no_of_pass = $fetch1['no_of_passengers'];
						$flight_no = $fetch1['flight_no'];
						$date = $fetch1['journey_date'];
					}
					else{
						echo "Error";
					}

					if($class=='economy')
					{
						$query5 = "UPDATE flight_details SET seats_economy=seats_economy+'$no_of_pass' WHERE flight_no='$flight_no' AND departure_date='$date'";
						$result5 = mysqli_query($dbc,$query4);
					}
					else if($class=='business')
					{
						$query5 = "UPDATE Flight_Details SET seats_business=seats_business+'$no_of_pass' WHERE flight_no='$flight_no' AND departure_date='$date'";
						$result5 = mysqli_query($dbc,$query4);
					}
					if($result5)
					{
						header("location: cancel_booked_tickets_success.php");
					}
					else
					{
						echo "Submit Error";
					}
				}
				else
				{
					echo "Submit Error";
					header("location: cancel_booked_tickets.php?msg=failed");
				}
				mysqli_close($dbc);		
			}
			else
			{
				echo "Cancel request not received";
			}
		?>
	</body>
</html>