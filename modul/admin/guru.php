<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
        $kodeGuru = null;
        $namaGuru = null;
        $id_update = null;
    if (isset($_GET['id'])){
      $id= $_GET['id'];
      $query_hapus = mysqli_query($conn,"DELETE FROM `tbl_guru` WHERE id = $id");
      echo '<div class="alert alert-danger">data berhasil dihapus</div>';
    }

    if (isset($_GET['edit'])){   
      $id= $_GET['edit'];
      $qedit="SELECT * FROM `tbl_guru` WHERE id = $id";
      $query_edit = mysqli_query($conn, $qedit);
      foreach($query_edit as $key => $data){$kodeGuru = $data['kode_guru'];$namaGuru = $data['nama_lengkap'];$id_update = $data['id'];}
    }

    if(isset($_POST['update']))
    {   
        $kodeGuru = $_POST['kodeGuru'];
        $namaGuru = $_POST['namaGuru'];
        $id_update = $_POST['id_update'];
        $qupdate = "UPDATE `tbl_guru` SET kode_guru = '$kodeGuru', nama_lengkap = '$namaGuru' WHERE id = $id_update";
        $query_add = mysqli_query($conn, $qupdate);
        if($query_add==TRUE) echo '<div class="alert alert-warning">data berhasil dirubah</div>';
    }

    if(isset($_POST['simpan']))
    {   
        $kodeGuru = $_POST['kodeGuru'];
        $namaGuru = $_POST['namaGuru'];
        $query_add = mysqli_query($conn,"INSERT INTO `tbl_guru` (id, kode_guru, nama_lengkap) VALUES ('', '$kodeGuru', '$namaGuru')");
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
            <?php if($id_update != null) echo '<input type="text" class="form-control" value ='.$id_update.' name="id_update" readonly>'  ?>
              <label for="kodeGuru">Kode Guru</label>
              <input class="form-control" type="text" value="<?php if($kodeGuru != null) {echo $kodeGuru; }  else { echo null; }   ?>" name="kodeGuru" class="form-control" id="kodeGuru" placeholder="Masukkan Kode Guru">
            </div>
            <div class="form-group">
              <label for="namaGuru">Nama Guru</label>
              <input class="form-control" type="text" value="<?php if($namaGuru != null) {echo $namaGuru; }  else { echo null; } ?>" name="namaGuru" class="form-control" id="namaGuru" placeholder="Masukkan Nama Guru">
            </div>
            <button type="submit" name="simpan"class="btn btn-primary">Simpan</button>
            <button type="submit" name="update" class="btn btn-secondary ml-2">Update</button>&nbsp;
            <a href="guru.php" class="btn btn-warning"> Reset</a>
          </form>
        </div>
      </div><br><br><br>
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_guru = mysqli_query($conn, "SELECT * FROM tbl_guru"); 
              $no = 1;
              ?>
              <tr>
                <th>No</th>
                <th>kode guru</th>  
                <th>nama lengkap</th>   
                <th>action</th>  
                <th></th>  
              </tr>
          </thead>
          <tbody>

                <?php while($data_guru = mysqli_fetch_array($query_guru)) {?>
                  <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $data_guru['kode_guru'] ?></td>
                    <td><?= $data_guru['nama_lengkap'] ?></td>
                    <td><a href="?id=<?= $data_guru[0] ?>"><button class="btn btn-danger">hapus</button></a></td>
                    <td><a href="?edit=<?= $data_guru[0] ?>"><button class="btn btn-warning">edit</button></a></td>
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