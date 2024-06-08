<!-- blok PHP -->
<?php 
    include '../../config/koneksi.php';
    // ambil data untuk nama guru
    $query_guru = mysqli_query($conn, "SELECT * FROM `tbl_guru`");
?>
<!-- blok HTML -->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
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
                        <img src="../../assets/images/logo/admin.png" height="100px" alt="">
                            <h3>Absensi Panitia <?= $nama_ujian ?> </br> SMK Fatahillah Cileungsi</h3><br>
                        </div>
                        <form action="verifikasi.php" method="post" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kelas">Nama Panitia</label>
                                        <select class="form-control" name="kode_guru" id="">
                                            <?php while($data_guru = mysqli_fetch_object($query_guru)){ ?>
                                                <option value="<?= $data_guru->kode_guru ?>"><?= $data_guru->nama_lengkap ?></option>
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