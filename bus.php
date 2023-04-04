<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data bus</title>
    <style>
        .status_aktif {
            background-color: #29ab87;
            color: white;
        }
        .status_warning {
            background-color: #Ffff00;
        }
        .status_rusak {
            background-color: #Db1514;
        }
    </style>
  </head>

  <body>
    <h1>
        Manajemen Trans UPN
    </h1>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:50px;">
              <li>
                <a href="index.php">Data Trans Bus UPN</a>
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
                  <a href="tambahdata.php">Tambah Data</a>
              </li>
              <li>
                  <a href="gajikaryawan.php">Hitung Gaji</a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><div> ID BUS berhasil di update</div>';
              }
              else if ($status=='error'){
                echo '<br><div role="alert"> ID BUS gagal di update</div>';
              }

            }
           ?>
            <?php  
                if (isset($_GET['status'])) {
                    $status_bus = $_GET['status'];
                    $queryBus = "SELECT * FROM bus WHERE 'status' = '$status'";
                } else {
                    $queryBus = "SELECT * FROM bus";
                }
                $hasil = mysqli_query(connection(), $queryBus);
            ?>
            <h2>status = <?= $status ?></h2>
            <p>FILTER</p>
            <form action="" method="get">
                <select name="status" id="status" required>
                    <option value="">PILIH</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak/Service</option>
                </select>
                <button type="submit">Pilih</button>
                <a href="bus.php"><button type="button">Reset</button></a>
            </form>
          <h2 style="margin: 30px 0 30px 0;">TimeLine BUS Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID BUS</th>
                  <th>PLAT</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //menampilkan database
                  $query = "SELECT * FROM bus";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'aktif';} elseif ($data['status'] == 2) { echo 'warning';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "updatedata.php?id=".$data['id_bus']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletedata.php?id=".$data['id_bus']; ?>"> Delete</a>
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