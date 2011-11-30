<?php if(!isset($_SESSION)){session_start();}  ?>
<?php include("anti_xss.php"); ?>

<?php
//Input validation
//This MUST come before everything, including the header!
$errorMessage="";
if(strlen(trim($_POST['familyName'])) < 3)
	$errorMessage=$errorMessage.'<li>Family Name must be at least 3 letters long</li>'."\n";

if(!preg_match('/..*@..*\...*/i',$_POST['emailAddress'])) //checks for x@x.x where x is at least 1 character
	$errorMessage=$errorMessage.'<li>Your email address is invalid</li>'."\n";

if($_POST['emailAddress'] != $_POST['confirmEmail'])
	$errorMessage=$errorMessage.'<li>Confirmation email does not match</li>'."\n";

if(strlen($_POST['password']) < 4)
	$errorMessage=$errorMessage.'<li>Password must be at least 4 characters long</li>'."\n";

if($_POST['password']!=$_POST['confirmPassword'])
	$errorMessage=$errorMessage.'<li>Confirmation password does not match</li>'."\n";

//query sql for familyName
$familyName=anti_xss($_POST['familyName']);
include "dbconnect.php";
$compareQuery="SELECT family_name FROM user_account ";
$compareResult=mysqli_query($db, $compareQuery) or die("Error Querying Database");
if(!isset($checkName))
	$checkName=NULL;
while($row=mysqli_fetch_array($compareResult) and $checkName!=$familyName)
{
	$checkName=$row['family_name'];
}


//test if user exists
if($checkName==$familyName)
{
	$familyNameExists=true;
	$errorMessage=$errorMessage.'<li>The family name already exists</li>'."\n";
}

if(strlen(trim($errorMessage)) > 0)
{
	include("register.php");
	exit(0);
}
//End input validation
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <?php
	//$familyName = check_input($_POST['familyName'], "Family Name is required.");
	//$email    = check_input($_POST['emailAddress'],"An Email Address is required.");
	//$confirmEmail    = check_input($_POST['confirmEmail'],"Please confirm e-mail address.");
	//$pw    = check_input($_POST['password'],"A password is required.");
	//$confirmPw = check_input($_POST['confirmPassword'],"Please confirm password.");
	$familyName=anti_xss($_POST['familyName']);
	$escapedFamilyName=mysqli_real_escape_string($db,$familyName);
	$email=anti_xss($_POST['emailAddress']);
	$escapedEmail=mysqli_real_escape_string($db,$email);
	$pw=$_POST['password']; //don't anti-xss password because we don't care what they put.  It'll be mysql-escaped later and it's never printed so it isn't a script issue.  They can have all spaces for all we care so we don't want to change what they typed either.
	$escapedPw=mysqli_real_escape_string($db,$pw);


	
	//Actually put them in the database
	include "dbconnect.php";
	$query= "INSERT INTO user_account(family_name,email,password) VALUES
	('".$escapedFamilyName."','".$escapedEmail."','".$escapedPw."')";
	$result = mysqli_query($db, $query) or die("Error Querying Database");
	mysqli_close($db);
	
	//Rather than making them click stuff, just send them to the login page!
	$nonErrorMessage="Thank you for registering.";
	unset($errorMessage);
	include("login.php");

	/*
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
*/
?>


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
