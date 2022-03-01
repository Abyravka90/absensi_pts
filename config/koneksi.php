<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db-absensi-pts';

    $conn = mysqli_connect($host, $user, $pass, $db) OR die(mysqli_error());
    // if($conn == true){
    //     echo 'sukses';
    // }
?>