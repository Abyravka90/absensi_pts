<?php 
    include('../../config/header.php');
    include('../../config/koneksi.php');
?>
<div class="container">
    <div class="card">
        <div class="card-header  text-center">
        <img src="../../assets/images/logo/school.png" width="50px" alt=""><br><span class="lead">link soal ujian</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                    <?php
                    $query_soal = mysqli_query($conn, "SELECT * FROM tbl_soal"); 
                    $no = 1;
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>  
                        <th>Mata Pelajaran</th>   
                        <th>Link Soal</th>  
                    </tr>
                    </thead>
                    <tbody>

                        <?php while($data_soal = mysqli_fetch_array($query_soal)) {?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $data_soal['nama_kelas'] ?></td>
                            <td><?= $data_soal['nama_mapel'] ?></td>
                            <td><a href="<?= $data_soal['link_soal'] ?>"><?= $data_soal['link_soal'] ?></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>