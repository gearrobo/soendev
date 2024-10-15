<?php
		$servername = "10.100.10.25:3307";
        $username = "root";
        $password = "s@tkom1ndo";
        $db="soey7928_satkomproject";
	   	
		$connection = new mysqli($servername, $username, $password);

		// Check connection
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		echo "Connected successfully";

		
?>