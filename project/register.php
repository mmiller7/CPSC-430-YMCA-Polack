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
		
			<?php
			if(isset($errorMessage))
			{
				echo '<br><font color="red"><b>Error - the following entries need to be fixed:</b><ul>',$errorMessage,'</ul></font><br>',"\n";
			}
			?>

			<form method ="post" action="confirmRegister.php">
			<table>
			<tr>
			<td>Family Name:</td>
			<td>
			<input type="text" name="familyName" value="<?php echo $_POST['familyName'] ?>" maxlength="20" />
			</td>
			</tr>
			<tr>
			<td>Email Address:</td>
			<td>
			<input type="text" name="emailAddress" value="<?php echo $_POST['emailAddress'] ?>" maxLength="50"/>
			</td>
			</tr>
			<tr>
			<td>Confirm Email Address:</td>
			<td>
			<input type="text" name="confirmEmail" value="<?php echo $_POST['confirmEmail'] ?>" maxLength="50"/>
			</td>
			</tr>
			<tr>
			<td>Desired Password:</td>
			<td>
			<input type="password" name="password" maxLength="20"/> (minimum 4 characters)
			</td>
			</tr>
			
			<tr>
			<td>Retype Password:</td>
			<td>
			<input type="password" name="confirmPassword" maxLength="20"/>
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
