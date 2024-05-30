<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
    if (isset($_GET['id'])){
      $id= $_GET['id'];
      // echo "DELETE From `tbl_absen_pengawas` WHERE id = $id";
      $unlink_gambar = mysqli_query($conn, "SELECT * FROM `tbl_absen_pengawas` WHERE id = $id");
      $data = mysqli_fetch_array($unlink_gambar);
      $image = $data['foto'];
      $ttd = $data['ttd'];
      unlink('../pengawas/foto/'.$image);
      unlink('../pengawas/signatures/'.$ttd);
      $query_hapus = mysqli_query($conn,"DELETE FROM `tbl_absen_pengawas` WHERE id = $id");
    
      
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
              $query_pengawas = mysqli_query($conn, "SELECT * FROM tbl_absen_pengawas JOIN tbl_guru JOIN tbl_kelas JOIN tbl_mapel 
              Where tbl_absen_pengawas.kode_guru = tbl_guru.kode_guru 
              AND tbl_absen_pengawas.id_kelas = tbl_kelas.id_kelas 
              AND tbl_absen_pengawas.id_mapel = tbl_mapel.id_mapel"); 
              ?>
              <tr>
                <th>kode guru</th>  
                <th>nama lengkap</th>  
                <th>Kelas</th>  
                <th>mata pelajaran</th>  
                <th>foto</th>  
                <th>ttd</th>  
                <th>waktu absen</th>  
                <th>action</th>  
              </tr>
          </thead>
          <tbody>
              
                <?php while($data_pengawas = mysqli_fetch_array($query_pengawas)) {?>
                  <tr>
                    <td><?= $data_pengawas['kode_guru'] ?></td>
                    <td><?= $data_pengawas['nama_lengkap'] ?></td>
                    <td><?= $data_pengawas['nama_kelas'] ?></td>
                    <td><?= $data_pengawas['nama_mapel'] ?></td>
                    <td><img height="50px" src="../pengawas/foto/<?= $data_pengawas['foto'] ?>" alt="foto"></td>
                    <td><img height="50px"src="../pengawas/signatures/<?= $data_pengawas['ttd'] ?>" alt="ttd"></td>
                    <td><?= $data_pengawas['time'] ?></td>
                    <td><a href="?id=<?= $data_pengawas[0] ?>"><button class="btn btn-danger">hapus</button></a></td>
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