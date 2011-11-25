<?php
	if($_SERVER['HTTP_HOST'] == "swimrays.mwcpsc.org")
	{
		//For Bluehost
		$db = mysqli_connect('localhost', 'mwcpscor_swimray', 'swimrayuser','mwcpscor_swimrays_db');
	}
	else if($_SERVER['HTTP_HOST'] == "secure.bluehost.com")
	{
		//For Bluehost
		$db = mysqli_connect('box546.bluehost.com', 'mwcpscor_swimray', 'swimrayuser','mwcpscor_swimrays_db');
	}
	else
	{
		//For local testing
		$db = mysqli_connect('localhost', 'swimrayuser', 'swimrayuser','swimrays_db');
	}
	
	if (!$db){
		die("Couldn't connect!");
	}
?>
