<?php 
	session_start();
?>

<html>
	<head>
		<title>Login Handler</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Login']))
			{
				require_once('Database Connection file/mysqli_connect.php');
				$email=$_POST['email'];
				$password=$_POST['password'];
				$user_type=$_POST['user_type'];
				$_SESSION['user_type']=$user_type;
				
				if($user_type=='Customer')
				{
					$query="SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
					$result = mysqli_query($dbc,$query);
					$count = mysqli_num_rows($result);

					if($count==1)
					{
						$fetch = mysqli_fetch_assoc($result);
						$_SESSION['login_user']=$fetch['user_name'];
						$_SESSION['user_id'] = $fetch['id'];
						echo "Logged in <br>";
						echo $_SESSION['login_user']." is logged in";
						header("location: customer_homepage.php");
					}
					else
					{
						echo "Login Error";
						header('location:login.php?msg=failed');
					}
				}
				else if($user_type=='Administrator')
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
					$result = mysqli_query($dbc,$query);
					$count = mysqli_num_rows($result);

					if($count==1)
					{
						$fetch = mysqli_fetch_assoc($result);
						$_SESSION['login_user']=$fetch['user_name'];
						$_SESSION['user_id'] = $fetch['id'];
						echo "Logged in <br>";
						echo $_SESSION['login_user']." is logged in";
						header('location:admin_homepage.php');
					}
					else
					{
						echo "Login Error";
						header('location:login.php?msg=failed');
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