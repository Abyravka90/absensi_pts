<!-- blok PHP -->
<?php 
include '../../config/koneksi.php';

?>
<!-- blok HTML -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <title>Admin Pts</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <?php 
    $jenis = $_GET['jenis'];
    $id_kelas = 2;
    $id_mapel = 1;
    if(isset($_GET['id_kelas'])){
        $id_kelas = $_GET['id_kelas'];
      }
    if(isset($_GET['id_mapel'])){
        $id_mapel = $_GET['id_mapel'];
      }
    ?>
    <div class="col-md-8">
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_siswa = mysqli_query($conn, "SELECT * FROM `tbl_siswa` JOIN tbl_kelas  JOIN tbl_mapel 
              WHERE tbl_siswa.id_kelas AND tbl_kelas.id_kelas = '$id_kelas' AND tbl_mapel.id_mapel = '$id_mapel'"); 
              ?>
              <tr>
                <th>no peserta</th>  
                <th>nama lengkap</th>  
                <th>kelas</th>  
                <th>mata pelajaran</th>  
                <th>foto</th>  
                <th>ttd</th>  
                <th>waktu absen</th>  
              </tr>
          </thead>
          <tbody>
              
                <?php while($data_siswa = mysqli_fetch_object($query_siswa)) {?>
                  <tr>
                    <td><?= $data_siswa -> nisn ?></td>
                    <td><?= $data_siswa -> nama_lengkap ?></td>
                    <td><?= $data_siswa -> nama_kelas ?></td>
                    <td><?= $data_siswa -> nama_mapel ?></td>
                    <td><img height="50px" src="../siswa/foto/<?= $data_siswa -> foto ?>" alt="foto"></td>
                    <td><img height="50px"src="../siswa/signatures/<?= $data_siswa -> ttd ?>" alt="ttd"></td>
                    <td><?= $data_siswa -> time ?></td>
                  </tr>
                <?php } ?>
          </tbody>
      </table>
      <p>
        <input type="button" value="Export ke PDF" id="btPrint" onclick="createPDF()"/></p>
    </div>
    </div>
    <!-- tutup row dan container -->
    </div>
    </div>
    <script>
      function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>