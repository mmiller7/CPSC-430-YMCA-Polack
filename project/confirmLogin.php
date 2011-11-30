<?php 
if(!isset($_SESSION)){session_start();} 
include "dbconnect.php";
include("anti_xss.php");
$name=anti_xss($_POST['familyName']);
$pw=$_POST['password'];
?>
			
			<?php
				$name=mysqli_real_escape_string($db,$name);
				$pw=mysqli_real_escape_string($db,$pw);
				
				$query = "select * from user_account WHERE family_name = '$name' AND password ='$pw'";
				$result = mysqli_query($db, $query);
				if ($row = mysqli_fetch_array($result)){
				
				$_SESSION['name']=$name;
				$_SESSION['account_id']=$row['account_id'];
				echo $_SESSION['account_id'];
				//don't store password in session, could be unsecure.  Wasn't used anyway so we don't need it.

				//echo "<p><font color=black>Thanks for logging in, $name family!</font></p>\n";
				//echo "<p><a href=\"home.php\"><font color=blue>Continue</font></a></p>";
				//echo "";
				
				//rather than making them click, just send them there when they log in okay
				include("home.php");					
					
				}else{
				
				//This case is the only time we should give them other stuff, when they had a problem.
				//Probaby ought to give them the form again to make it user friendly.
				
				$errorMessage="Invalid username or password.";
				include("login.php");
				/*
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
					
				 echo "We're sorry your username or password has illuded us at this time,please try again.";
				 echo "<br>";
				 echo "<br>";
					?>
					<a href="login.php"><font color="blue">Back to Login</font></a>
		</div>
	</body>
</html>
				<?php
				*/
				}
			?>
			
