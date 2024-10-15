<?php

	include 'connect.php';
   	date_default_timezone_set('Asia/Jakarta');
	$wktu = date("Y-m-d H:i:s");

	$serialnumber = $_GET['serialnumber'];
	$status = $_GET['status'];
	$suhu = $_GET['suhu'];
	$kelembaban = $_GET['kelembaban'];
	$wakir = $_GET['wakir'];


	echo $serialnumber."<br>";

	$devicedb = "SELECT * FROM device_sens";
	$datas = $connection->query($devicedb);
	foreach ($datas as $data) 
	{
		$uid_sens = $data['uid'];
		$id_device = $data['id'];

		if ($serialnumber == $uid_sens)
		{
			echo "device ditemukan <br>";
			$sql = "UPDATE device_sens SET value = '$status', updated_at = '$wktu' WHERE uid = '$serialnumber' ";
			if(mysqli_query($connection,$sql)){
				$res = " INSERT INTO sens (device_id, status, suhu, kelembaban, waktu_kirim, created_at) VALUES ('$id_device','$status','$suhu','$kelembaban','$wakir','$wktu') ";
				if(mysqli_query($connection,$res)){
					echo "Berhasil tambah";
				}else{
					echo "gagal tambah";
				}
			}else{
				echo "gagal update";
			}
		}
	}

	$connection -> close();
?>
