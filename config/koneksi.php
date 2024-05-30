<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_absensi';

    $conn = mysqli_connect($host, $user, $pass, $db) OR die(mysqli_error());
   
    //nama ujian
    $nama_ujian = 'PAT';
    //nama link
    $link = 'absensi_pts';
?>