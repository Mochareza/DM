<?php
// Memulai session untuk melacak status login pengguna
session_start();

// Memeriksa apakah pengguna sudah login dengan memeriksa variabel session 'login'
// Jika pengguna belum login, arahkan mereka ke halaman login dan hentikan eksekusi script
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil file function.php yang berisi fungsi-fungsi untuk operasi database
require 'function.php';

// Memeriksa apakah tombol 'simpan' pada form telah diklik
if (isset($_POST['simpan'])) {
    // Jika fungsi tambah berhasil menyimpan data, tampilkan alert dan arahkan pengguna ke halaman index.php
    if (tambah($_POST)) {
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah gagal menyimpan data, tampilkan alert dengan pesan kesalahan
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Menyertakan CSS Bootstrap untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Menyertakan ikon Bootstrap untuk ikon dalam halaman -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Menyertakan font dari Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Menyertakan CSS kustom untuk halaman -->
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah Data</title>
    <!-- Menyertakan favicon untuk tab browser -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <!-- Link ke halaman utama dengan logo -->
            <a class="navbar-brand" href="index.php">
                <img src="img/favicon.ico" width="30px">
                <span> DM DATABASE</span>
            </a>
            <!-- Tombol untuk toggling navbar pada tampilan kecil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Link untuk logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
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
                <!-- Judul halaman -->
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Mahasiswa</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <!-- Form untuk menambahkan data mahasiswa -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Input untuk NIM Mahasiswa -->
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM Mahasiswa</label>
                        <input type="number" class="form-control w-50" id="nim" placeholder="Masukkan NIM" min="1" name="nim" autocomplete="off" required>
                    </div>
                    <!-- Input untuk Nama Lengkap -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" autocomplete="off" required>
                    </div>
                    <!-- Dropdown untuk Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select id="jenis_kelamin" class="form-select form-control-md w-50" name="jenis_kelamin" autocomplete="off" required>
                                <option selected> Jenis Kelamin </option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input untuk Kelas -->
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control w-50" id="kelas" placeholder="Masukkan Kelas" name="kelas" autocomplete="off" required>
                    </div>
                    <!-- Input untuk Jurusan -->
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control w-50" id="jurusan" placeholder="Masukkan Jurusan" name="jurusan" autocomplete="off" required>
                    </div>
                    <!-- Input untuk Semester -->
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="number" class="form-control w-50" id="semester" placeholder="Masukkan Semester" name="semester" autocomplete="off" required>
                    </div>
                    <!-- Tombol untuk kembali ke halaman utama -->
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <!-- Tombol untuk menyimpan data -->
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

</body>

</html>
