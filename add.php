<?php

	include 'connect.php';
   	date_default_timezone_set('Asia/Jakarta');
	$wktu = date("Y-m-d H:i:s");

	$api_uid = $_GET['uid'];
	$value = $_GET['data'];

	echo $api_uid;

	$datas = "SELECT * FROM device_sens";
	foreach ($datas as $data) {
		$uid_sens = $data['uid'];

		echo $uid_sens;
	}

	// $query_sens = "SELECT * FROM device_sens WHERE uid=$api_uid";

	// if ($result_sens = $connection->query($query_sens)) {
	// 	while ($row_sens = $result_sens->fetch_assoc()) {

	// 		$device_name = $row_sens['nama_device'];
	// 		$id_device = $row_sens['id'];

	// 		echo $id_device;
	// 	}
	// /*freeresultset*/
	// $result_sens->free();
	// }


    // $result = "INSERT INTO sens (device_send_id, data, created_at)
    // VALUES ('$id_device', '$value', '$wktu')";

    // if(mysqli_query($conn,$result)){
    //     echo '
    //     <div class="alert alert-success" role="alert">
    //     Data Anda telah ditambahkan!
    //   </div>
    //     ';
    // }

   	// header("Location: index.php");
?>
