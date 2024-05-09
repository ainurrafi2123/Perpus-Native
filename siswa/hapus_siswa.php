<?php
include_once '../config/koneksi.php';

if(isset($_GET['id_siswa'])){
    $id_siswa = $_GET['id_siswa'];
    $qry_hapus = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
    
    if($qry_hapus){
        echo "<script>alert('Sukses hapus siswa');location.href='tampil_siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus siswa');location.href='tampil_siswa.php';</script>";
    }
}
?>
