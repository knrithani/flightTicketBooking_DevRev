<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Travel/Ticket Details
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=number] {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 0px;
			}
			input[type=submit] {
				background-color: #030337;
				height: 50px;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 600px;
    			font-size: 15px;
			}
			input[type=radio] {
    			margin-right: 30px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 15px;
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
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<?php
			$no_of_pass=$_SESSION['no_of_pass'];
			$class=$_SESSION['class'];
			$count=$_SESSION['count'];
			$flight_no=$_POST['select_flight'];
			$_SESSION['flight_no']=$flight_no;
			echo "<h2>ADD PASSENGERS DETAILS</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
			while($count<=$no_of_pass)
			{
				echo "<p><strong>PASSENGER ".$count."<strong></p>";
				echo "<table cellpadding=\"0\">";
				echo "<tr>";
				echo "<td class=\"fix_table_short\">Passenger's Name</td>";
				echo "<td class=\"fix_table_short\">Passenger's Age</td>";
				echo "<td class=\"fix_table_short\">Passenger's Gender</td>";
				echo "<td class=\"fix_table_short\">Passenger's Inflight Meal</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
				echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
				echo "<td class=\"fix_table_short\">";
				echo "<select name=\"pass_gender[]\">";
  				echo "<option value=\"male\">Male</option>";
  				echo "<option value=\"female\">Female</option>";
  				echo "<option value=\"other\">Other</option>";
  				echo "</select>";
  				echo "</td>";
  				echo "<td class=\"fix_table_short\">";
				echo "<select name=\"pass_meal[]\">";
  				echo "<option value=\"yes\">Yes</option>";
  				echo "<option value=\"no\">No</option>";
  				echo "</select>";
  				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br><hr><br>";
				$count=$count+1;
			}
			echo"<br>";
			echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
			echo "</form>";
		?>
		
	</body>
</html>