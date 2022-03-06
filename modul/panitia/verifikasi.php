<?php
error_reporting(0);
include '../../config/koneksi.php';
if(isset($_POST['signaturesubmit'])){ 
    $kode_guru = $_POST['kode_guru'];
    $signature = $_POST['signature'];
    $signatureFileName = uniqid().'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = 'signatures/'.$signatureFileName;
    file_put_contents($file, $data);
    $update_absen_pengawas = mysqli_query($conn,"UPDATE `tbl_absen_guru` SET ttd = '$signatureFileName' WHERE kode_guru = '$kode_guru'");
    if($update_absen_pengawas == true){
        echo '<script>alert("berhasil disimpan");window.location.href="../login"</script>';
    }else{
        echo '<script>alert("gagal disimpan");window.location.href="absen.php"</script>';
    }
} 
if(isset($_POST['kode_guru'])){
    $kode_guru = $_POST['kode_guru'];

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $nama = $_FILES['foto']['name'];
    $x = explode('.',$nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if(in_array($ekstensi,$ekstensi_diperbolehkan)=== true){
        move_uploaded_file($file_tmp, 'foto/'.$nama);
        $query_insert_absen_guru = mysqli_query($conn, "INSERT INTO `tbl_absen_guru` (id, kode_guru, id_mapel, id_kelas, jabatan, foto, `time`)
        VALUES('', '$kode_guru', 0, 0, 'panita', '$nama', now())");
        $query_select_panitia = mysqli_query($conn, "SELECT * FROM `tbl_absen_guru` JOIN `tbl_guru` 
        WHERE tbl_absen_guru.kode_guru ='$kode_guru' AND tbl_absen_guru.kode_guru = tbl_guru.kode_guru");
        $data_panitia = mysqli_fetch_object($query_select_panitia);
        $nama_panitia = $data_panitia -> nama_lengkap;
        $foto = $data_panitia -> foto;
    }else{
        echo '<script>alert("format harus gambar");window.location.href="absen.php"</script>';
    }
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5  offset-md-3">
                <div class="card">
                        <div class="card-header text-center">
                            <img src="../../assets/images/logo/school.png" height="50px" alt="">
                            <h3>Absensi PTS SMK Fatahillah</h3><br>
                        </div>
                        <div class="card-body text-center">
                            <div class="alert alert-warning">Data yang dikirimkan adalah </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 pl-4"><img class="img-thumbnail"src="foto/<?php echo $foto ?>" height="50px" alt=""></div>
                                    <div class="col-md-8">
                                        Kode Guru : <span class="badge badge-info"><?= $kode_guru ?></span><br>
                                        Nama : <span class="badge badge-info"><?= $nama_panitia ?></span><br>
                                        Foto : <span class="badge badge-info"><?= $foto ?></span><br>
                                    </div>
                                </div>
                            </div>
                            <b>Tanda Tangan</b>
                            <div class="card" id="canvasDiv"></div>
                        </div>
                    </div>
                    <hr>
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>    
                <button type="button" class="btn btn-success" id="btn-save">Save</button>
            </div>
            <form id="signatureform" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="kode_guru" value=<?= $kode_guru ?> >
                <input type="hidden" name="signaturesubmit" value="1">
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>
</html>