<?php
	if($SERVER['HTTP_HOST'] == "swimrays.mwcpsc.org")
	{
		//For Bluehost
		$db = mysqli_connect('localhost', 'mwcpscor_swimray', 'swimrayuser','mwcpscor_swimrays_db');
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
