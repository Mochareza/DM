<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!--Mengatur set karakter halaman ke UTF-8.-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menyertakan Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Mengoptimalkan koneksi ke Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!--Menyertakan font "Righteous" dari Google Fonts-->
    <!-- Menggunakan file CSS Sendiri -->
    <link rel="stylesheet" href="css/login.css">

    <title>Register</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
        <!--Membuat navbar dengan kelas Bootstrap untuk tampilan gelap dan responsif.-->
        <div class="container">
            <a class="navbar-brand" href="indexmahasiswa.php"><img src="img/favicon.ico" width="30px"><span> DM DATABASE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!--Menyertakan tautan navigasi yang akan ditampilkan pada toggling.-->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    <!--Item navigasi yang mengarahkan ke halaman login.-->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menutup Navbar -->

    <div class="container">
        <!--Membungkus konten utama dalam container Bootstrap.-->
        <div class="row my-5">
            <!--Membuat baris dengan margin vertikal.-->
            <div class="col-md-6 text-center login" style="background-image: url('img/bg/memphis-colorful.png');">
            <!--Membuat kolom dengan lebar 6, teks tengah, dan latar belakang gambar.-->
                <h4 class="fw-bold">Register | Admin</h4>
                <!-- Menampilkan pesan error jika registrasi gagal -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password sudah digunakan!");</script>'; ?>
                <?php endif; ?>
                <form action="process_register.php" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Menggunakan Bootstrap JavaScript bundle untuk interaktivitas. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
