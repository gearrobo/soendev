<?php
    function Connection(){
		$servername = "localhost";
        $username = "soey7928_monsis";
        $password = "adminit2024";
        $db="soey7928_satkomproject";
	   	
		$connection = new mysqli($servername, $username, $password, $db);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>