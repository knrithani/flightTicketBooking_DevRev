<html>
	<head>
		<title>Logout Process</title>
	</head>
	<body>
		<?php
			session_start();
			session_destroy();
			header("location: home_page.php");
		?>
	</body>
</html>