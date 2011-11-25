<?php session_start();
include "dbconnect.php";
$name=$_POST['username'];
$pw=$_POST['pw'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<title>Confirming Login</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<div id="wrap">
			<?php include("header.php"); ?>
			
			<?php
				$name=mysqli_real_escape_string($db,$name);
				$pw=mysqli_real_escape_string($db,$name);
				
				$query = "select * from user_account WHERE family_name = '$name' AND password ='$pw'";
				$result = mysqli_query($db, $query);
				//echo"<p>check1</p>"; 
				if ($row = mysqli_fetch_array($result)){
				
				$_SESSION['name']=$name;
				//don't store password in session, could be unsecure

				echo "<p><font color=black>Thanks for logging in, $name family user</font></p>\n";
				echo "<p><a href=\"home.php\"><font color=blue>Continue</font></a></p>";
		
					
					
				}else{
					
					
				 echo "We're sorry your username or password has illuded us at this time,please try again.";
				 echo "<br>";
				 echo "<br>";
					?>
					<a href="login.php"><font color="blue">Back to Login</font></a>
				<?php
				}
			?>
			
			
			
			
			
		</div>
	</body>
</html>
