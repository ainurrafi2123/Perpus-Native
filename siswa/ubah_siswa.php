<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once '../config/koneksi.php';
    $id_siswa = $_GET['id_siswa'];
    $qry_get_siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
    $dt_siswa = mysqli_fetch_array($qry_get_siswa);
    ?>
    <div class="container">
        <h3>Ubah Siswa</h3>
        <form action="proses_ubah_siswa.php" method="post">
            <input type="hidden" name="id_siswa" value="<?= $dt_siswa['id_siswa'] ?>">
            <label for="nama_siswa">Nama Siswa :</label>
            <input type="text" name="nama_siswa" value="<?= $dt_siswa['nama_siswa'] ?>" class="form-control">
            <label for="tanggal_lahir">Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" value="<?= $dt_siswa['tanggal_lahir'] ?>" class="form-control">
            <label for="gender">Gender :</label>
            <select name="gender" class="form-control">
                <option value="">Pilih Gender</option>
                <?php
                $arr_gender = array('L' => 'Laki-laki', 'P' => 'Perempuan');
                foreach ($arr_gender as $key_gender => $val_gender) {
                    $selected = ($key_gender == $dt_siswa['gender']) ? 'selected' : '';
                    echo '<option value="' . $key_gender . '" ' . $selected . '>' . $val_gender . '</option>';
                }
                ?>
            </select>
            <label for="alamat">Alamat :</label>
            <textarea name="alamat" class="form-control" rows="4"><?= $dt_siswa['alamat'] ?></textarea>
            <label for="id_kelas">Kelas :</label>
            <select name="id_kelas" class="form-control">
                <option value="">Pilih Kelas</option>
                <?php
                $qry_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                while ($data_kelas = mysqli_fetch_array($qry_kelas)) {
                    $selected = ($data_kelas['id_kelas'] == $dt_siswa['id_kelas']) ? 'selected' : '';
                    echo '<option value="' . $data_kelas['id_kelas'] . '" ' . $selected . '>' . $data_kelas['nama_kelas'] . '</option>';
                }
                ?>
            </select>
            <label for="username">Username :</label>
            <input type="text" name="username" value="<?= $dt_siswa['username'] ?>" class="form-control">
            <label for="password">Password :</label>
            <input type="password" name="password" value="" class="form-control">
            <br>
            <input type="submit" name="simpan" value="Simpan Perubahan" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
