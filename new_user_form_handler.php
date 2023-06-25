<html>
	<head>
		<title>Add New User</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				$user_name=$_POST['username'];
				$password=$_POST['password'];
				$email_id=$_POST['email'];	
				$name=$_POST['name'];
				$phone_no=$_POST['phone_no'];
				$address=$_POST['address'];
				

				require_once('Database Connection file/mysqli_connect.php');
				$query = "SELECT * FROM customer WHERE email='$email_id'";
				$result = mysqli_query($dbc,$query);
				if (mysqli_num_rows($result) > 0) 
				{
  	  				echo'<script type="text/JavaScript">alert("This email aleady exists");</script>';
  				}
				else
				{
					$query2="INSERT INTO customer (name,user_name,email,password,phone,address) VALUES ('$name','$user_name','$email_id','$password','$phone_no','$address')";
					$result2 = mysqli_query($dbc,$query2);
					if($result2)
					{
						header('location:user_reg_success.php');
					}
				    else
					{
						echo "Submit Error";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>