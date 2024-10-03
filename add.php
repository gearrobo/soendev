<?php
   	include("connect.php");
	$api_uid = $_GET["uid"];
	$data=$_GET["data"];

	echo $api_uid;
	echo "<br>";
	echo $data;

	$query_sens = "SELECT * FROM device_sens ";

	if ($result_sens = $connection->query($query_sens)) {
		while ($row_sens = $result_sens->fetch_assoc()) {
			$uid = $row_sens['uid'];
		}
	/*freeresultset*/
	$result_sens->free();
	}



	// $query = "INSERT INTO 'sens' ('data', 'updated_at') 
	// 	VALUES ('".$data."','".$waktu."')"; 
   	
   	// mysql_query($query,$link);
	// mysql_close($link);

   	// header("Location: index.php");
?>
