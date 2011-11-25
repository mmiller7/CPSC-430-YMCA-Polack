<?php
	if(($_SERVER['HTTP_HOST'] == "swimrays.mwcpsc.org") || preg_match('/.*bluehost\.com/i',gethostbyaddr($_SERVER['HTTP_HOST'])) || preg_match('/.*bluehost\.com/i',$_SERVER['HTTP_HOST']))
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
