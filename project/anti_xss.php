<?php
//This is the anti-xss function for easy updating

if(!$anti_xss_function_exists)
{
	$anti_xss_function_exists=true;
	function anti_xss($raw)
	{
		//strip_tags syntax the second parameter lists all ALLOWED html tags
		$raw = strip_tags($raw,'<b>,<i>,<u>,<font>,<li>,<ul>,<ol>,<p>');

		//parse newlines as <br> -- don't allow <br> because we only
		//want it to be allowed on forms that support multi-line entry
		$raw = nl2br($raw);
		$raw = str_replace("\r",'',$raw);
		$raw = str_replace("\n",'',$raw);

		//clean up any leading or trailing spaces
		$raw = trim($raw);

		//return the result
		return $raw;
	}
}
?>
