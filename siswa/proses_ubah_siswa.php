<?php
include_once '../config/koneksi.php';

if($_POST){
    $id_siswa=$_POST['id_siswa'];
    $nama_siswa=$_POST['nama_siswa'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id_kelas=$_POST['id_kelas'];
    
    if(empty($nama_siswa)){
        echo "<script>alert('Nama siswa tidak boleh kosong');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
    } elseif(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
    } else {
        if(empty($password)){
            $update = mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir', gender='$gender', alamat='$alamat', username='$username', id_kelas='$id_kelas' WHERE id_siswa='$id_siswa'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
            }
        } else {
            $update = mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir', gender='$gender', alamat='$alamat', username='$username', password='$password', id_kelas='$id_kelas' WHERE id_siswa='$id_siswa'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
            }
        }
    }
}
?>
