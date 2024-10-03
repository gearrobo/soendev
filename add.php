<?php
   	include("connect.php");
   	
   	$link=Connection();

	$data=$_POST["data"];

	$query = "INSERT INTO 'sens' ('data', 'updated_at') 
		VALUES ('".$data."','".$waktu."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>
