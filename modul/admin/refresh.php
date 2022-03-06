<?php 
    include '../../config/koneksi.php';


    // ambil data untuk kelas
    $query_kelas = mysqli_query($conn, "TRUNCATE `tbl_siswa`");
    $query_kelas = mysqli_query($conn, "TRUNCATE `tbl_absen_guru`");
    
    $files_panitia    =glob('../panitia/foto/*');
    foreach ($files_panitia as $file_panitia) {
    if (is_file($file_panitia))
    unlink($file_panitia); // hapus file
    }

    $files_pengawas    =glob('../pengawas/foto/*');
    foreach ($files_pengawas as $file_pengawas) {
    if (is_file($file_pengawas))
    unlink($file_pengawas); // hapus file
    }

    $files_pengawas_ttd    =glob('../pengawas/signatures/*');
    foreach ($files_pengawas_ttd as $file_pengawas_ttd) {
    if (is_file($file_pengawas_ttd))
    unlink($file_pengawas_ttd); // hapus file
    }
 
    $files_panitia_ttd    =glob('../panitia/signatures/*');
    foreach ($files_panitia_ttd as $file_panitia_ttd) {
    if (is_file($file_panitia_ttd))
    unlink($file_panitia_ttd); // hapus file
    }

    $files_siswa    =glob('../siswa/foto/*');
    foreach ($files_siswa as $file_siswa) {
    if (is_file($file_siswa))
    unlink($file_siswa); // hapus file
    }

    $files_siswa_ttd    =glob('../siswa/signatures/*');
    foreach ($files_siswa_ttd as $file_siswa_ttd) {
    if (is_file($file_siswa_ttd))
    unlink($file_siswa_ttd); // hapus file
    }

?>
<script>
    alert('berhasil bersihkan data');
    window.location.href='siswa.php';
</script>