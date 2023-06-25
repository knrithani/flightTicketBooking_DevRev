<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
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
		<div class="form-box">
			<form class="input-grp" action="login_process.php" method="POST">
				<input type="email" name="email" class="input-field" placeholder="Email" required>
				<input type="password" name="password" class="input-field" placeholder="Password" required><br><br><br>
				<input type="radio" name="user_type" value="Customer" required>
				<label for="Customer">User</label><br><br>
				<input type="radio" name="user_type" value="Administrator">
				<label for="Administrator">Admin</label><br><br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "<br>
						<strong style='color:red'>Invalid Username/Password</strong>
						<br><br>";
					}
				?>

				<button type="submit" name="Login" class="submit-btn">Login</button><br><br>
				<a href="new_user.php"><i class="input-field"></i> Create New User Account?</a>
			</form>
			
		</div>
		
	</div>

</body>
</html>