<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
    // ambil data untuk kelas
    $query_kelas = mysqli_query($conn, "SELECT * FROM `tbl_kelas`");
    // ambil data untuk mapel
    $query_mapel = mysqli_query($conn, "SELECT * FROM `tbl_mapel`");
?>
<!-- blok HTML -->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-primary">
  <span class="navbar-brand mb-0 h1 text-light">Absensi SMK Fatahillah Cileungsi</span>
</nav>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5  offset-md-3">
                <div class="card">
                        <div class="card-header text-center bg-white">
                        <img src="../../assets/images/logo/student.png" height="300px" alt="">
                            <h3>Absensi Siswa </br> SMK Fatahillah Cileungsi</h3><br>
                        </div>
                        <form action="verifikasi.php" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nisn">Nomor Ujian</label>
                                        <input name = "nisn" type="number" class="form-control" placeholder="Masukan Nomor Ujian">
                                        <small class="form-text text-danger">kosongkan jika tidak punya Nomor Ujian</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">Nomor Hp</label>
                                        <input name = "no_telp" type="number" class="form-control" placeholder="Masukan Nomor Ujian" required>
                                        <small class="form-text text-danger">*data ini wajib diisi</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="form-control" name="kelas" id="">
                                            <?php while($data_kelas = mysqli_fetch_object($query_kelas)){ ?>
                                                <option value="<?= $data_kelas->id_kelas ?>"><?= $data_kelas->nama_kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="mapel">Mata Pelajaran</label>
                                        <select class="form-control" name="mapel" id="">
                                            <?php while($data_mapel = mysqli_fetch_object($query_mapel)){ ?>
                                                    <option value="<?= $data_mapel->id_mapel ?>"><?= $data_mapel->nama_mapel ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>    
                                    <div class="form-group">
                                        <label for="foto">foto</label><br>
                                        <input type="file" name="foto">
                                    </div>    
                                </div>
                                <hr>
                                <div class="text-center pb-2">
                                    <button name="simpan" type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                    <button type="button" class="btn btn-secondary" id="reset-btn">Clear</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
</html>