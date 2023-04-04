
<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Manajemen Trans UPN</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
  </head>

  <body>
    <div>
      <div>
        <nav>
          <div>
            <table>
            <ul style="margin-top:100px;">
              <li>
                <a href="UTS.php">Data Trans Bus UPN</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="bus.php">Data Bus</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahTrans.php">Add Data Trans UPN</a>
              </li>
              <li>
                  <a href="tambahKondektur.php">Add Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahDriver.php">Add Data Driver</a>
              </li>
              <li>
                  <a href="tambahBus.php">Add Data BUS</a>
              </li>
              <li>
                  <a href="gaji.php">Hitung Gaji Driver</a>
              </li>
              <li>
                  <a href="gajiKondektur.php">Hitung Gaji Kondektur</a>
              </li>
            </ul>
            </table>
          </div>
        </nav>

        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>ID Trans BUS berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Trans BUS gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Trans UPN</th>
                  <th>ID Kondektur</th>
                  <th>ID BUS</th>
                  <th>ID Driver</th>
                  <th>Jumlah KM</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM trans_upn";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "updateTransupn.php?id=".$data['id_trans_upn']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletetransupn.php?id=".$data['id_trans_upn']; ?>"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>