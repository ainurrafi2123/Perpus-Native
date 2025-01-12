<?php 
    include_once ('../header.php');
?>
<h2>Histori Peminjaman Buku</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Pinjam</th><th>Tanggal harus Kembali</th><th>Nama Buku</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        // Sambungkan ke database
        include_once '../config/koneksi.php';
        
        $qry_histori=mysqli_query($conn,"select * from peminjaman_buku order by id_peminjaman_buku desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan buku yang dipinjam
            $buku_dipinjam="<ul>";
            $qry_buku=mysqli_query($conn, "SELECT * FROM detail_peminjaman_buku 
                                JOIN buku ON buku.id_buku = detail_peminjaman_buku.id_buku 
                                WHERE id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
            if (!$qry_buku) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
          }
          
            while($dt_buku=mysqli_fetch_array($qry_buku)){
                $buku_dipinjam.="<li>".$dt_buku['nama_buku']."</li>";
            }
            $buku_dipinjam.="</ul>";
            //menampilkan status sudah kembali atau belum
            $qry_cek_kembali=mysqli_query($conn,"select * from pengembalian_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
            if(mysqli_num_rows($qry_cek_kembali)>0){
                $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
                $denda="denda Rp. ".$dt_kembali['denda'];
                $status_kembali="<label class='alert alert-success'>Sudah kembali <br>".$denda."</label>";
                $button_kembali="";
            } else {
                $status_kembali="<label class='alert alert-danger'>Belum kembali</label>";
                $button_kembali="<a href='../cart/kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"Terimakasih sudah kembalikan\")'>Kembalikan</a>";
            }
        ?>
            <tr>
                <td><?=$no?></td><td><?=$dt_histori['tanggal_pinjam']?></td><td><?=$dt_histori['tanggal_kembali']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
    include_once('../footer.php');
?>
