<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Stingray Login</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
	<body>
		<div id="wrap">
			<?php include("header.php"); ?>
			<form method="post" action="home.php">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" /><br />
				<label for="pw">Password:</label>
				<input type="password" id="pw" name="pw" /><br />
				<input type="submit" value="Login" name="submit" />
		    </form>
		  	<?php include("footer.html"); ?>
		</div>
	</body>
</html>