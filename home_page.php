<?php
	session_start();
?>
<html>
	<head>
		<title>
			Online Flight Ticket Booking
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div class="navbar">
			<ul>
				<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
				<li><a href="home_page.php">Home</a></li>
				<li>
					<?php
						if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Customer')
						{
							echo "<a href=\"book_tickets.php\">Book Tickets</a>";
						}
						else if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Administrator')
						{
							echo "<a href=\"admin_ticket_message.php\">Book Tickets</a>";
						}
						else
						{
							echo "<a href=\"login.php\">Book Tickets</a>";
						}
					?>
				</li>
				<li><a href="home_page.php">About Us</a></li>
				<li>
					<?php
						if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Customer')
						{
							echo "<a href=\"customer_homepage.php\">Login</a>";
						}
						else if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Administrator')
						{
							echo "<a href=\"admin_homepage.php\">Login</a>";
						}
						else
						{
							echo "<a href=\"login.php\">Login</a>";
						}
					?>
				</li>
			</ul>
		</div>
		<div class="container">
			<img src="images/flight3.jpg" width=100% height="700px">
		</div>
	</body>
</html>