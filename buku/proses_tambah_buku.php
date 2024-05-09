<?php
    if($_POST){
        $nama_buku=$_POST['nama_buku'];
        $deskripsi=$_POST['deskripsi'];
        $id_buku=$_POST['id_buku'];
        $foto_buku = $_FILES['foto_buku']['name'];
        $foto_buku_tmp = $_FILES['foto_buku']['tmp_name']; // Lokasi file sementara
        
        if(empty($nama_buku)){
            echo "<script>alert('nama buku tidak boleh kosong');location.href='../cart/tambah_buku.php';</script>";
        } else {
            // Tentukan direktori tujuan untuk menyimpan file
            $target_dir = "../assets/foto_buku/";
            $target_file = $target_dir . basename($foto_buku);

            // Pindahkan file yang diunggah ke direktori tujuan
            if(move_uploaded_file($foto_buku_tmp, $target_file)) {
                include_once '../config/koneksi.php';
                $insert=mysqli_query($conn,"INSERT INTO buku (nama_buku, deskripsi, foto_buku, id_buku) VALUES ('$nama_buku','$deskripsi','$foto_buku','$id_buku')") or die(mysqli_error($conn));
                if($insert){
                    echo "<script>alert('Sukses menambahkan buku');location.href='../cart/buku.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan buku');location.href='../cart/tambah_buku.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah file');location.href='../cart/tambah_buku.php';</script>";
            }
        }
    }
?>
