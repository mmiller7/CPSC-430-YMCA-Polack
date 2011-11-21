<div id="Navigation">
<?php
	if(!isset($_SESSION['name']))
	{
	?>
	<a href="welcome.php">Home</a>
	|
	<a href="login.php">Login</a>
	|
	<a href="register.php">Register</a>
<?php	
	}else
		{?>
			<a href="home.php">Home</a>
			
		<?php	
		}
		?>
</div>