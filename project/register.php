<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Stingray Account Registration</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
	<body>
		<div id="wrap">
			<?php include("header.php"); ?>
			<?php echo 'This is the register page'; ?>
			
			<form method ="post" action="confirmRegister.php">
			<table>
			<tr>
			<td>Family Name:</td>
			<td>
			<input type="text" name="familyName" value="" maxlength="20" />
			</td>
			</tr>
			<tr>
			<td>Email Address:</td>
			<td>
			<input type="text" name="emailAddress" value="" maxLength="50"/>
			</td>
			</tr>
			<tr>
			<td>Confirm Email Address:</td>
			<td>
			<input type="text" name="confirmEmail" value="" maxLength="50"/>
			</td>
			</tr>
			<tr>
			<td>Desired Password:</td>
			<td>
			<input type="text" name="password" value="" maxLength="20"/>
			</td>
			</tr>
			
			<tr>
			<td>Retype Password:</td>
			<td>
			<input type="text" name="confirmPassword" value="" maxLength="20"/>
			</td>
			</tr>
			
			<tr>
			<td>
			<input type="submit" value="Register Account">
			</td>
			</tr>
			</form>
			
			<?php include("footer.html"); ?>
		</div>
		
		
	</body>
</html>