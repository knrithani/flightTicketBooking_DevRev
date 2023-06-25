<?php
	session_start();
?>
<html>
	<head>
		<title>Add Ticket Details</title>
	</head>
	<body>
		<?php
			$i=1;
			if(isset($_POST['Submit']))
			{
				$pnr=rand(1000000,9999999);
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$booking_status="PENDING";
				$no_of_pass=$_SESSION['no_of_pass'];
				$total_no_of_meals=0;
				$_SESSION['pnr']=$pnr;

				$payment_id=NULL;
				$customer_id=$_SESSION['user_id'];

				require_once('Database Connection file/mysqli_connect.php');

				if($_SESSION['class']=='economy')
				{	
					$query="SELECT economy_price FROM flight_details where flight_no='$flight_no' and departure_date='$journey_date'";
					$result=mysqli_query($dbc,$query);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT business_price FROM flight_details where flight_no='$flight_no' and departure_date='$journey_date'";
					$result=mysqli_query($dbc,$query);
				}

				$query2="INSERT INTO ticket_details(pnr,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id,customer_id) VALUES ('$pnr','$flight_no','$journey_date','$class','$booking_status','$no_of_pass','$payment_id','$customer_id')";
				$result2 = mysqli_query($dbc,$query2);

				for($i=1;$i<=$no_of_pass;$i++){
					if($_POST['pass_meal'][$i-1]=='yes')
						$total_no_of_meals++;
				}
				$_SESSION['total_no_of_meals']=$total_no_of_meals;

				if($result2)
				{
					echo "Successfully Submitted<br>";
					header("location: payment_details.php");
				}
				else
				{
					echo "Submit Error";
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>