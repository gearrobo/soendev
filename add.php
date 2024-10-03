<?php

	include 'connect.php';
   	date_default_timezone_set('Asia/Jakarta');
	$wktu = date("Y-m-d H:i:s");

	$api_uid = $_GET['uid'];
	$value = $_GET['data'];

	$devicedb = "SELECT * FROM device_sens";
	$datas = $connection->query($devicedb);
	foreach ($datas as $data) 
	{
		$uid_sens = $data['uid'];
		$id_device = $data['id'];

		if ($api_uid == $uid_sens)
		{
			// echo "device ditemukan";
			$sql = "UPDATE device_sens SET value = '$value', updated_at = '$wktu' WHERE uid = '$api_uid' ";
			if(mysqli_query($connection,$sql)){
				$res = " INSERT INTO sens (device_id, value, created_at) VALUES ('$id_device','$value','$wktu') ";
				if(mysqli_query($connection,$res)){
					// echo "Berhasil tambah";
				}else{
					// echo "gagal tambah";
				}
			}else{
				// echo "gagal update";
			}
		}
	}

	$connection -> close();
?>
