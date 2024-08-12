<?php
session_start();
// Memulai sesi PHP untuk melacak data sesi di seluruh halaman

// Jika pengguna sudah login, arahkan mereka ke halaman index.php
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil file function.php yang berisi fungsi-fungsi yang diperlukan
require 'function.php';

// Jika tombol login diklik
if (isset($_POST['login'])) {
    // Mengambil data dari form login
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Mengenkripsi password menggunakan md5

    // Mengambil data dari tabel admin berdasarkan username yang diberikan
    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

    // Mengecek jumlah baris yang cocok dengan query
    $cek = mysqli_num_rows($result);

    // Jika ada baris yang cocok, berarti login berhasil
    if ($cek > 0) {
        // Set session login
        $_SESSION['login'] = true;

        // Arahkan pengguna ke halaman index.php
        header('location:index.php');
        exit;
    }

    // Jika login gagal, set variabel error menjadi true
    $error = true;  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menggunakan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Menggunakan Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Menggunakan CSS Sendiri -->
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="indexmahasiswa.php"><img src="img/favicon.ico" width="30px"><span> DM DATABASE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menutup Navbar -->

    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/bg/memphis-colorful.png');">
                <h4 class="fw-bold">Login | Admin</h4>
                <!-- Menampilkan pesan error jika login gagal -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Menggunakan Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
