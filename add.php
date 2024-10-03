<?php
   	include("connect.php");
	
	$wktu = date("Y-m-d H:i:s");
	$api_uid = $_GET["uid"];
	$data=$_GET["data"];

	$query_sens = "SELECT * FROM device_sens WHERE 'uid' = '$api_uid' ";

	if ($result_sens = $connection->query($query_sens)) {
		while ($row_sens = $result_sens->fetch_assoc()) {
			$device_name = $row_sens['nama_device'];
			$uid_sens = $row_sens['uid'];
			$id_device = $row_sens['id'];

			echo $id_device;
		}
	/*freeresultset*/
	$result_sens->free();
	}



    // $result = "INSERT INTO sens (data, created_at)
    // VALUES ('$data', '$wktu')";

    // if(mysqli_query($conn,$result)){
    //     echo '
    //     <div class="alert alert-success" role="alert">
    //     Data Anda telah ditambahkan!
    //   </div>
    //     ';
    // }

   	// header("Location: index.php");
?>
