<!-- blok PHP -->
<?php
    include '../../config/koneksi.php';
        $id_kelas = null;
        $nama_kelas = null;
        $id_update = null;
    if (isset($_GET['id'])){
      $id= $_GET['id'];
      $query_hapus = mysqli_query($conn,"DELETE FROM `tbl_soal` WHERE id_soal = $id");
      echo '<div class="alert alert-danger">data berhasil dihapus</div>';
    }

    if (isset($_GET['edit'])){   
      $id_kelas= $_GET['edit'];
      $qedit="SELECT * FROM `tbl_kelas` WHERE id_kelas = $id_kelas";
      $query_edit = mysqli_query($conn, $qedit);
      foreach($query_edit as $key => $data){$nama_kelas = $data['nama_kelas'];$id_update = $data['id_kelas'];}
    }

    if(isset($_POST['update']))
    {   
        $nama_kelas = $_POST['nama_kelas'];
        $id_update = $_POST['id_update'];
        $qupdate = "UPDATE `tbl_kelas` SET nama_kelas = '$nama_kelas' WHERE id_kelas = $id_update";
        $query_add = mysqli_query($conn, $qupdate);
        if($query_add==TRUE) echo '<div class="alert alert-warning">data berhasil dirubah</div>';
    }

    if(isset($_POST['simpan']))
    {   
        $nama_mapel = $_POST['nama_mapel'];
        $nama_kelas = $_POST['nama_kelas'];
        $link_soal = $_POST['link_soal'];
        $query_add = mysqli_query($conn,"INSERT INTO `tbl_soal` (id_soal, nama_mapel, nama_kelas, link_soal) VALUES ('', '$nama_mapel', '$nama_kelas', '$link_soal')");
        if($query_add==TRUE) echo '<div class="alert alert-success">data berhasil ditambahkan</div>';
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
    <div class="row justify-content-center">
        <div class="col-md-12">
          <form action="" method="post">
            <div class="form-group">
              <label for="nama_mapel">Mata Pelajaran</label>
              <input class="form-control" type="text" name="nama_mapel" class="form-control" id="kodeGuru" placeholder="Masukkan Nama Kelas">
            </div>
            <div class="form-group">
              <label for="nama_mapel">Nama Kelas</label>
              <input class="form-control" type="text" name="nama_kelas" class="form-control" id="kodeGuru" placeholder="Masukkan Nama Kelas">
            </div>
            <div class="form-group">
              <label for="nama_mapel">Link Soal</label>
              <input class="form-control" type="text" name="link_soal" class="form-control" id="kodeGuru" placeholder="Masukkan Nama Kelas">
            </div>
            <button type="submit" name="simpan"class="btn btn-primary">Simpan</button>
            <button type="submit" name="update" class="btn btn-secondary ml-2">Update</button>&nbsp;
            <a href="kelas.php" class="btn btn-warning"> Reset</a>
          </form>
        </div>
      </div><br><br><br>
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_soal = mysqli_query($conn, "SELECT * FROM tbl_soal"); 
              $no = 1;
              ?>
              <tr>
                <th>No</th>
                <th>Nama Kelas</th>  
                <th>nama Soal</th>   
                <th>Link Soal</th>  
                <th></th>  
                <th></th>  
              </tr>
          </thead>
          <tbody>

                <?php while($data_soal = mysqli_fetch_array($query_soal)) {?>
                  <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $data_soal['nama_kelas'] ?></td>
                    <td><?= $data_soal['nama_mapel'] ?></td>
                    <td><?= $data_soal['link_soal'] ?></td>
                    <td><a href="?id=<?= $data_soal[0] ?>"><button class="btn btn-danger">hapus</button></a></td>
                    <td><a href="?edit=<?= $data_soal[0] ?>"><button class="btn btn-warning">edit</button></a></td>
                  </tr>
                <?php } ?>
          </tbody>
      </table>
    </div>
    </div>
    <!-- tutup row dan container -->
    </div>
    </div>
    <?php include('../../config/footer.php') ?>
  </body>
</html>