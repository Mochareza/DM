<?php

// Memanggil file function.php yang berisi fungsi-fungsi yang diperlukan
require 'function.php';

// Mengambil semua data dari tabel mahasiswa dan mengurutkannya berdasarkan NIM secara menurun
$siswa = query("SELECT * FROM mahasiswa ORDER BY nim DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Menyertakan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Menyertakan ikon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Menyertakan CSS DataTables untuk Bootstrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <!-- Menyertakan font dari Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Menyertakan CSS kustom -->
    <link rel="stylesheet" href="css/style.css">

    <title>DM MAHASISWA</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <!-- Brand dan logo pada navbar -->
            <a class="navbar-brand" href="indexmahasiswa.php"><img src="img/favicon.ico" width="30px"><span> DM DATABASE</span></a>
            <!-- Button untuk toggle navbar pada tampilan mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container utama -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <hr>
                <!-- Judul halaman -->
                <h3 class="text-center fw-bold text-uppercase">Data Mahasiswa</h3>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <!-- Tombol untuk menambahkan data mahasiswa baru dan mengekspor data ke Excel -->
                <a href="addDataMahasiswa.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="export.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <!-- Tabel untuk menampilkan data mahasiswa -->
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <!-- Looping melalui setiap data mahasiswa dan menampilkannya dalam tabel -->
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nim']; ?></td>
                                <td><?= $row['jenis_kelamin']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td><?= $row['semester']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Menyertakan jQuery dan DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables pada tabel dengan id "data"
            $('#data').DataTable();
        });
    </script>
</body>

</html>
