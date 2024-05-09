<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        a:link, a:visited {
        background-color: white;
        color: black;
        border: 2px solid green;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        }

        a:hover, a:active {
        background-color: green;
        color: white;
        }
    </style>
    <title>Tambah Kelas</title>
</head>
<body>
    <div class="container">
        <h3>Tambah Kelas</h3>
        <form action="proses_tambah_kelas.php" method="post">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas :</label>
                <input type="text" name="nama_kelas" value="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kelompok" class="form-label">Kelompok :</label>
                <input type="text" name="kelompok" value="" class="form-control">
            </div>
            <input type="submit" name="simpan" value="Tambah Kelas" class="btn btn-primary">
            <div class="mt-3">
                <a href="tambah_siswa.php">Register Siswa</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
