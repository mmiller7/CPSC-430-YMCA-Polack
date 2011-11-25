<?php session_start();
include "dbconnect.php";
?>
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
			<center>
			<?php
			if(isset($errorMessage))
			{
				echo '<br><font color="red"><b>Error: </b>',$errorMessage,'</font><br>',"\n";
			}
			if(isset($nonErrorMessage))
			{
				echo '<br>',$nonErrorMessage,'<br>',"\n";
			}
			?>
				<br>
				Please log in:
				<form method="post" action="confirmLogin.php">
				<table>
				<tr><td>Family Name:</td>
				<td><input type="text" id="familyName" name="familyName" /></td></tr>
				<tr><td>Password:</td>
				<!-- type password? < if this is a question, yes.  It works just like type=text but shows stars instead of the real letters. -->
				<td><input type="password" id="password" name="password" /></td></tr>
				</table>
				<?php if(isset($sendTo)) { ?><input type="hidden" name="sendTo" valule="<?php echo $sendTo ?>"><?php } ?>
				<input type="submit" value="Login" name="submit" />
		    </form></center>
		  	<?php include("footer.html"); ?>
		</div>
	</body>
</html>
