<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
    if (isset($_GET['id'])){
      $id= $_GET['id'];
      // echo "DELETE From `tbl_absen_pengawas` WHERE id = $id";
      $unlink_gambar = mysqli_query($conn, "SELECT * FROM `tbl_absen_panitia` WHERE id = $id");
      $data = mysqli_fetch_array($unlink_gambar);
      $image = $data['foto'];
      $ttd = $data['ttd'];
      unlink('../panitia/foto/'.$image);
      unlink('../panitia/signatures/'.$ttd);
      $query_hapus = mysqli_query($conn,"DELETE FROM `tbl_absen_panitia` WHERE id = $id");
    }
?>
<!-- blok HTML -->
<!doctype html>
<html lang="en">
  <head>
  <?php include('../../config/header.php') ?>
    <title>Admin <?= $nama_ujian ?></title>
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <div class="col-md-8">
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_panitia = mysqli_query($conn, "SELECT * FROM tbl_absen_panitia JOIN tbl_guru
              Where tbl_absen_panitia.kode_guru = tbl_guru.kode_guru");
              ?>
              <tr>
                <th>kode guru</th>  
                <th>nama lengkap</th>     
                <th>foto</th>  
                <th>ttd</th>  
                <th>waktu absen</th>
                <th>action</th>  
              </tr>
          </thead>
          <tbody>
              
                <?php while($data_panitia = mysqli_fetch_array($query_panitia)) {?>
                  <tr>
                    <td><?= $data_panitia['kode_guru'] ?></td>
                    <td><?= $data_panitia['nama_lengkap']?></td>
                    <td><img height="50px" src="../panitia/foto/<?= $data_panitia['foto'] ?>" alt="foto"></td>
                    <td><img height="50px"src="../panitia/signatures/<?= $data_panitia['ttd'] ?>" alt="ttd"></td>
                    <td><?= $data_panitia['time']?></td>
                    <td><a href="?id=<?= $data_panitia[0] ?>"><button class="btn btn-danger">hapus</button></a></td>
                  </tr>
                <?php } ?>
          </tbody>
      </table>
    </div>
    <p>
      <input type="button" value="Export ke PDF" id="btPrint" onclick="createPDF()"/>
    </p>
    </div>
    <!-- tutup row dan container -->
    </div>
    </div>
    <?php include('../../config/footer.php') ?>
  </body>
</html>