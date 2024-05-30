<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
    // ambil data untuk kelas
    $query_kelas = mysqli_query($conn, "SELECT * FROM `tbl_kelas`");
    if (isset($_GET['id'])){
      $id= $_GET['id'];
      // echo "DELETE From `tbl_absen_pengawas` WHERE id = $id";
      $unlink_gambar = mysqli_query($conn, "SELECT * FROM `tbl_siswa` WHERE id = $id");
      $data = mysqli_fetch_array($unlink_gambar);
      $image = $data['foto'];
      $ttd = $data['ttd'];
      unlink('../siswa/foto/'.$image);
      unlink('../siswa/signatures/'.$ttd);
      $query_hapus = mysqli_query($conn,"DELETE FROM `tbl_siswa` WHERE id = $id");
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
    <?php 
    $jenis = 'siswa';
    $id_kelas = 2;
    if(isset($_GET['id_kelas'])){
        $id_kelas = $_GET['id_kelas'];
      }

    ?>
    <div class="col-md-8">
      <form action="" method="get">
        <div class="form-group">
          <label for="mapel">Pilih Kelas :</label>
            <select class="form-control" name="id_kelas" id="">
                <?php while($data_kelas = mysqli_fetch_object($query_kelas)){ ?>
                   <option value="<?= $data_kelas->id_kelas ?>"><?= $data_kelas->nama_kelas ?></option>
                    <?php } ?>
                   </select>
        </div>
        <button type="submit" class="btn btn-info mb-3">Pilih</button>  
      </form>
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_siswa = mysqli_query($conn, "SELECT * FROM `tbl_kelas` JOIN `tbl_siswa` JOIN `tbl_mapel`
              WHERE tbl_kelas.id_kelas = tbl_siswa.id_kelas 
              AND tbl_siswa.id_mapel = tbl_mapel.id_mapel
              AND tbl_siswa.id_kelas = '$id_kelas'"); 
              ?>
              <tr>
                <th>no peserta</th>  
                <th>nama lengkap</th>  
                <th>kelas</th>  
                <th>mata pelajaran</th>  
                <th>foto</th>  
                <th>ttd</th>  
                <th>waktu absen</th>
                <th>action</th>  
              </tr>
          </thead>
          <tbody>
              
                <?php while($data_siswa = mysqli_fetch_array($query_siswa)) {?>
                  <tr>
                    <td><?= $data_siswa['nisn'] ?></td>
                    <td><?= $data_siswa['nama_lengkap'] ?></td>
                    <td><?= $data_siswa['nama_kelas'] ?></td>
                    <td><?= $data_siswa['nama_mapel'] ?></td>
                    <td><img height="50px" src="../siswa/foto/<?= $data_siswa['foto'] ?>" alt="foto"></td>
                    <td><img height="50px"src="../siswa/signatures/<?= $data_siswa['ttd'] ?>" alt="ttd"></td>
                    <td><?= $data_siswa['time'] ?></td>
                    <td><a href="?id=<?= $data_siswa[2] ?>"><button class="btn btn-danger">hapus</button></a></td>
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