<?php
   	include("connect.php");
   	
   	$link=Connection();

	$data_1=$_POST["data1"];
	$data_2=$_POST["data2"];

	$query = "INSERT INTO `device_sens` (`data_1`, `data_2`) 
		VALUES ('".$data_1."','".$data_2."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>
