<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Payment Details
		</title>
		<style>

		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/payment_style.css"/>
	</head>
	<body>
		<div>
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="home_page.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<div class="container"> 
			<form class="form" action="payment_details_form_handler.php" method="post">
				<h2 style="text-align: center;">ENTER THE PAYMENT DETAILS</h2><br><br>
				<h3 style="margin-left: 30px"><u>Payment Summary</u></h3><br>
				<?php
					$flight_no=$_SESSION['flight_no'];
					$journey_date=$_SESSION['journey_date'];
					$no_of_pass=$_SESSION['no_of_pass'];
					$total_no_of_meals=$_SESSION['total_no_of_meals'];
					$payment_id=rand(100000000,999999999);
					$pnr=$_SESSION['pnr'];
					$_SESSION['payment_id']=$payment_id;
					$payment_date=date('Y-m-d'); 
					$_SESSION['payment_date']=$payment_date;

					require_once('Database Connection file/mysqli_connect.php');
					if($_SESSION['class']=='economy')
					{	
						$query="SELECT economy_price FROM flight_details where flight_no='$flight_no' and departure_date='$journey_date'";
						$result = mysqli_query($dbc,$query);
						$fetch = mysqli_fetch_assoc($result);
						$ticket_price = $fetch['economy_price'];
					}
					else if($_SESSION['class']=='business')
					{
						$query="SELECT business_price FROM flight_details where flight_no='$flight_no' and departure_date='$journey_date'";
						$result = mysqli_query($dbc,$query);
						$fetch = mysqli_fetch_assoc($result);
						$ticket_price = $fetch['business_price'];
					}
					$total_ticket_price=$no_of_pass*$ticket_price;
					$total_meal_price=250*$total_no_of_meals;
					
					$total_amount=$total_ticket_price+$total_meal_price;
					$_SESSION['total_amount']=$total_amount;

					echo "<table cellpadding=\"5\"	style='margin-left: 50px; border-spacing: 15px;'>";
					echo "<tr>";
					echo "<td class=\"fix_table\">Ticket charges: </td>";
					echo "<td class=\"fix_table\">&#x20b9; ".$total_ticket_price."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table\">Meal Combo Charges:</td>";
					echo "<td class=\"fix_table\">&#x20b9; ".$total_meal_price."</td>";
					echo "</tr>";
					echo "</table>";

					echo "<hr style='margin-right:10px; margin-left: 10px;'>";
					echo "<table cellpadding=\"5\" style='margin-left: 50px; border-spacing: 15px;'>";
					echo "<tr>";
					echo "<td class=\"fix_table\"><strong>Total:</strong></td>";
					echo "<td class=\"fix_table\">&#x20b9; ".$total_amount."</td>";
					echo "</tr>";
					echo "</table>";
					echo "<hr style='margin-right:10px; margin-left: 10px'>";
					echo "<br>";
					echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
					echo "<br>";
				?>
				<table cellpadding="5" style='margin-left: 50px; border-spacing: 15px;'>
					<tr>
						<td class="fix_table"><strong>Enter the Payment Mode:-</strong></td>
					</tr>
					<tr>
						<td class="fix_table">Credit Card <input type="radio" name="payment_mode" value="credit card" checked></td>
						<td class="fix_table">Debit Card <input type="radio" name="payment_mode" value="debit card"></td>
						<td class="fix_table">Net Banking <input type="radio" name="payment_mode" value="net banking"></td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Pay Now" name="Pay_Now">
			</form>			
		</div>

	</body>
</html>