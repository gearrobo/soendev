<?php
    include 'connect.php';
    $query = "SELECT * FROM sens ORDER BY id DESC";
    echo "<b> <center>Database Output</center> </b> <br> <br>";

    if ($result = $connection->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $id_sens = $row['id'];
            $data = $row['data'];
            $created_at = $row['created_at'];
            if ($data == 0) {
                $status = "Online";
            } elseif ($data == 1) {
                $status = "Offline";
            }
        }
    /*freeresultset*/
    $result->free();
    }

    $query_sens = "SELECT * FROM device_sens WHERE id = $id_sens ";

    if ($result_sens = $connection->query($query_sens)) {
        while ($row_sens = $result_sens->fetch_assoc()) {
            $device_name = $row_sens['nama_device'];
            $lokasi = $row_sens['lokasi'];
        }
    /*freeresultset*/
    $result_sens->free();
    }
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Monsis</title>
  </head>
  <body>
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Device</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM sens ORDER BY id DESC";
                            $datas = $connection->query($query);
                            foreach ($datas as $data) {
                                $id_sens = $data['id'];
                                $device_id = $data['device_id'];
                                $value = $data['value'];
                                if ($value == 0) {
                                    $status = "Online";
                                } elseif ($value == 1) {
                                    $status = "Offline";
                                }
                            
                        ?>
                            <tr>
                            <th scope="row">1</th>
                            <td><?= $device_id; ?></td>
                            <td>Device <?= $status; ?></td>
                            <td><?= $created_at; ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>