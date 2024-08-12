<?php
session_start();

// Jika pengguna belum login, arahkan kembali ke login.php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil file function.php yang berisi fungsi-fungsi yang dibutuhkan
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

    <!-- Menyertakan CSS Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Menyertakan ikon Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Menyertakan CSS DataTables untuk Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <!-- Menyertakan font dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Menyertakan CSS kustom -->
    <link rel="stylesheet" href="css/style.css">

    <title>DM ADMIN</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/favicon.ico" width="30px"><span> DM DATABASE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menutup Navbar -->

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
                <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="export.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <!-- Tabel untuk menampilkan data mahasiswa -->
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <!-- Looping melalui setiap data mahasiswa dan menampilkannya dalam tabel -->
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nim']; ?></td>
                                <td><?= $row['jenis_kelamin']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td><?= $row['semester']; ?></td>
                                <td>
                                    <!-- Tombol untuk mengubah data mahasiswa -->
                                    <a href="ubah.php?nim=<?= $row['nim']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |
                                    <!-- Tombol untuk menghapus data mahasiswa dengan konfirmasi -->
                                    <a href="hapus.php?nim=<?= $row['nim']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Menutup Container -->

    <!-- Menyertakan JS Bootstrap dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Menyertakan jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Menyertakan DataTables JS dari CDN -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Menyertakan DataTables Bootstrap JS dari CDN -->
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables pada tabel dengan id "data"
            $('#data').DataTable();
        });
    </script>
</body>

</html>
