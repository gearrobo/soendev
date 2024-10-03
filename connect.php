<?php
		$servername = "localhost";
        $username = "soey7928_monsis";
        $password = "adminit2024";
        $db="soey7928_satkomproject";
	   	
		$connection = new mysqli($servername, $username, $password, $db);

		// Check connection
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		//echo "Connected successfully";

		
?>