<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <?php
	$yourname = check_input($_POST['familyName'], "Family Name is required.");
	$email    = check_input($_POST['emailAddress'],"An Email Address is required.");
  ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Account Registration Confirmed</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
	<body>
		<div id="wrap">
			<?php include("header.php"); ?>
	
			The family name for your account is: <?php echo $_POST['familyName']; ?><br />
			The e-mail address for your account is: <?php echo $_POST['emailAddress']; ?><br />

	
	
			<?php include("footer.html"); ?>
		</div>
		
		
	</body>
	<?php
	 function check_input($data, $problem='')
	{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
	}
	
	function show_error($myError)
{
?>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<title>Account Registration Confirmed</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
	<body>
		<div id="wrap">
			<?php include("header.php"); ?>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>
    </br>
    </br>
    <a href="register.php"><font color="blue">Back to Registration Page</font></a>
					<?php include("footer.html"); ?>
		</div>
    </body>
    </html>
<?php
exit();
}
?>
</html>