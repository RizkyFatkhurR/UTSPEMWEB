<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $Id_kondektur = $_POST['id_kondektur'];
        $Id_bus = $_POST['id_bus'];
        $Id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

        $query = "INSERT INTO driver VALUES ('$idDriver','$nama','$noSIM','$alamat')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trans UPN</title>
</head>
<body>
<nav>
      <a href="index.php">Index</a>
    </nav>
    <div>
      <div>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Driver Trans UPN berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver Trans UPN gagal di-update</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Form Penambahan Rute Trans UPN</h2>
                <form action="tambahDriver.php" method="POST">
                    <div>
                        <label>ID Bus</label>
                        <input type="text" placeholder="ID" name="id_trans_upn" required="required">
                    </div>
                    <div>
                        <label>ID Kondektur</label>
                        <input type="text" placeholder="id_kondektur" name="id_kondektur" required="required">
                    </div>
                    <div>
                        <label>ID Bus</label>
                        <input type="text" placeholder="id_bus" name="id_bus" required="required">
                    </div>
                    <div>
                        <label></label>
                        <input type="text" placeholder="" name="" required="required">
                    </div>
                    <div>
                        <label>Jarak Tempuh</label>
                        <input type="text" placeholder="jumlah_km" name="jumlah_km" required="required">
                    </div>
                    <div>
                        <label>Tanggal</label>
                        <input type="text" placeholder="tanggal" name="tanggal" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>