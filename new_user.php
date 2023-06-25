<html>
	<head>
		<title>
			Create New User Account
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 135px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/register_style.css"/>
	</head>
	<body>
		<div class="container">
			<div>
				<ul>
					<li style="color: white; font-weight: bolder; font-size: 30px;">Online Flight Ticket Booking</li>
					<li><a href="home_page.php">Home</a></li>
					<li><a href="login.php">Book Tickets</a></li>
					<li><a href="home_page.php">About Us</a></li>
					<li><a href="home_page.php">Contact Us</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
			<br>
			<div class="form-box">
				<form class="center_form" action="new_user_form_handler.php" method="POST" id="new_user_from">
					<h3 style="text-align: center;">CREATE NEW USER ACCOUNT</h3>
					<br>
					<table cellpadding='10'>
						<strong>ENTER LOGIN DETAILS</strong><br><br>
						<tr>
							<td>Enter a valid username  </td>
							<td><input type="text" name="username" required><br><br></td>
						</tr>
						<tr>
							<td>Enter your desired password  </td>
							<td><input type="password" name="password" required><br><br></td>
						</tr>
						<tr>
							<td>Enter your email ID</td>
							<td><input type="text" name="email" required><br><br></td>
						</tr>
					</table>
					<br>
					<table cellpadding='10'>
						<strong>ENTER CUSTOMER'S PERSONAL DETAILS</strong><br><br>
						<tr>
							<td>Enter your name  </td>
							<td><input type="text" name="name" required><br><br></td>
						</tr>
						<tr>
							<td>Enter your phone no.</td>
							<td><input type="text" name="phone_no" required><br><br></td>
						</tr>
						<tr>
							<td>Enter your address</td>
							<td><input type="text" name="address" required><br><br></td>
						</tr>
					</table>
					<br>
					<input type="submit" value="Submit" name="Submit">
					<br>
				</form>
			</div>
		</div>
	</body>
</html>