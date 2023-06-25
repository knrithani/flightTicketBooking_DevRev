<?php
	session_start();
?>
<html>
	<head>
		<title>
			Cancel Booked Tickets
		</title>
		<style>

		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/cancel_style.css">
	</head>
	<body>
		<div>
			<ul>
				<li><a href="customer_homepage.php">Home</a></li>
				<li><a href="customer_homepage.php">Dashboard</a></li>
				<li><a href="home_page.php">About Us</a></li>
				<li><a href="home_page.php">Contact Us</a></li>
				<li><a href="logout_process.php">Logout</a></li>
			</ul>
		</div>
		<div class="container">
			<form class="form" action="cancel_booked_tickets_form_handler.php" method="post">

				<h2>CANCEL BOOKED TICKETS</h2><br><br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "<strong style='color: red'>*Invalid PNR, please enter PNR again</strong>
							<br>
							<br>";
					}
				?>
				<table cellpadding="5" style="padding-left: 60px;">
					<tr>
						<td>Enter the PNR</td>
					</tr>
					<tr>
						<td><input type="text" name="pnr" required></td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Cancel Ticket" name="Cancel_Ticket">
			</form>			
		</div>
	</body>
</html>