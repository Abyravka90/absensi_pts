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
    <div class="col-md-8">
    <div id="tab">
      <table class="table table-striped table-bordered table-hover" style="width:100%">
          <thead>
              <?php
              $query_panitia = mysqli_query($conn, "SELECT * FROM tbl_absen_guru JOIN tbl_guru
              Where tbl_absen_guru.kode_guru = tbl_guru.kode_guru  
              AND tbl_absen_guru. jabatan = 'panitia'"); 
            //   echo "SELECT * FROM tbl_absen_guru JOIN tbl_guru
            //   Where tbl_absen_guru.kode_guru = tbl_guru.kode_guru  
            //   AND tbl_absen_guru. jabatan = 'panitia'";
              ?>
              <tr>
                <th>kode guru</th>  
                <th>nama lengkap</th>  
                <th>Jabatan</th>    
                <th>foto</th>  
                <th>ttd</th>  
                <th>waktu absen</th>  
              </tr>
          </thead>
          <tbody>
              
                <?php while($data_panitia = mysqli_fetch_array($query_panitia)) {?>
                  <tr>
                    <td><?= $data_panitia[9] ?></td>
                    <td><?= $data_panitia[10]?></td>
                    <td><?= $data_panitia[4] ?></td>
                    <td><img height="50px" src="../panitia/foto/<?= $data_panitia[5] ?>" alt="foto"></td>
                    <td><img height="50px"src="../panitia/signatures/<?= $data_panitia[6] ?>" alt="ttd"></td>
                    <td><?= $data_panitia[7]?></td>
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
        win.document.write('<title>ABSENSI PTS SMK FATAHILLAH CILEUNGSI</title>');   // <title> FOR PDF HEADER.
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