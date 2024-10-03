<?php

	function Connection(){
		$server="localhost";
		$user="soey7928_monsis";
		$pass="adminit2024";
		$db="soey7928_satkomproject";
	   	
		$connection = mysql_connect($server, $user, $pass);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>