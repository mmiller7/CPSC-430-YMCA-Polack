<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Stingray Account Registration</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
		<script type="text/javascript">

		function validate()
		{
			bad="#FFCCCC";
			good="#CCFFCC";
			
			//familyName
			if(
					((document.getElementById("familyName").value).replace(/^\s*((?:[\S\s]*\S)?)\s*$/, '$1').length < 3)
					<?php if($familyNameExists) { ?>|| (document.getElementById("familyName").value == "<?php echo $_POST['familyName'] ?>" )<?php } ?>
				)
			{
				document.getElementById("familyName").style.background=bad;
				familyNameOk=false;
			}
			else
			{
				document.getElementById("familyName").style.background=good;
				familyNameOk=true;
			}

			if(!document.getElementById("emailAddress").value.match(/..*@..*\...*/i))
			{
				document.getElementById("emailAddress").style.background=bad;
				emailAddressOk=false;
			}
			else
			{
				document.getElementById("emailAddress").style.background=good;
				emailAddressOk=true;
			}

			if(!document.getElementById("confirmEmail").value.match(/..*@..*\...*/i) || (document.getElementById("emailAddress").value != document.getElementById("confirmEmail").value))
			{
				document.getElementById("confirmEmail").style.background=bad;
				confirmEmailAddressOk=false;
			}
			else
			{
				document.getElementById("confirmEmail").style.background=good;
				confirmEmailAddressOk=true;
			}
		
			if(document.getElementById("password").value.length < 4)
			{
				document.getElementById("password").style.background=bad;
				passwordOk=false;
			}
			else
			{
				document.getElementById("password").style.background=good;
				passwordOk=true;
			}

			if((document.getElementById("confirmPassword").value.length < 4) || (document.getElementById("password").value != document.getElementById("confirmPassword").value))
			{
				document.getElementById("confirmPassword").style.background=bad;
				confirmPasswordOk=false;
			}
			else
			{
				document.getElementById("confirmPassword").style.background=good;
				confirmPasswordOk=true;
			}

			//button control
			if (familyNameOk && emailAddressOk && passwordOk && confirmPasswordOk)
				document.register.submit.disabled=false;
			else
				document.register.submit.disabled=true;
		}
		</script>
	</head>
	<body onload="validate()">
		<div id="wrap">
			<?php include("header.php"); ?>
			<?php echo '<center>This is the register page</center>'; ?>
		
			<?php
			if(isset($errorMessage))
			{
				echo '<br><font color="red"><b>Error - the following entries need to be fixed:</b><ul>',$errorMessage,'</ul></font><br>',"\n";
			}
			?>
			<form name="register" method ="post" action="confirmRegister.php" onsubmit="document.register.submit.disabled=true;document.register.submit.value='Processing...'">
			<table align=center>
			<tr>
			<td>Family Name:</td>
			<td>
			<input type="text" id="familyName" name="familyName" value="<?php echo $_POST['familyName'] ?>" maxlength="20" onkeyup=validate() /><font size=-5> (minimum 3 letters)</font>
			</td>
			</tr>
			<tr>
			<td>Email Address:</td>
			<td>
			<input type="text" id="emailAddress" name="emailAddress" value="<?php echo $_POST['emailAddress'] ?>" maxLength="50" onkeyup=validate() />
			</td>
			</tr>
			<tr>
			<td>Confirm Email Address:</td>
			<td>
			<input type="text" id="confirmEmail" name="confirmEmail" value="<?php echo $_POST['confirmEmail'] ?>" maxLength="50" onkeyup=validate() />
			</td>
			</tr>
			<tr>
			<td>Desired Password:</td>
			<td>
			<input type="password" id="password" name="password" maxLength="20" onkeyup=validate() /><font size=-5> (minimum 4 characters)</font>
			</td>
			</tr>
			
			<tr>
			<td>Retype Password:</td>
			<td>
			<input type="password" id="confirmPassword" name="confirmPassword" maxLength="20" onkeyup=validate() />
			</td>
			</tr>
			
			<tr>
			<td>
			<input type="submit" name="submit" value="Register Account">
			</td>
			</tr>
			</form>
			
			<?php include("footer.html"); ?>
		</div>
		
		
	</body>
</html>
