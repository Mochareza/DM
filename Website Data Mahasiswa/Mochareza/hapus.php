<?php
session_start();
// Memulai sesi PHP untuk memastikan bahwa pengguna telah login

// Jika tidak ada session 'login', arahkan pengguna ke halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil file function.php yang berisi fungsi-fungsi yang diperlukan
require 'function.php';

// Mengambil nilai NIM dari parameter URL menggunakan metode GET
$nim = $_GET['nim'];

// Menghapus data mahasiswa berdasarkan NIM yang diberikan
if (hapus($nim) > 0) {
    // Jika fungsi hapus mengembalikan nilai lebih dari 0, tampilkan pesan berhasil dan arahkan ke index.php
    echo "<script>
                alert('Data Mahasiswa berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
} else {
    // Jika fungsi hapus mengembalikan nilai 0 atau kurang, tampilkan pesan gagal
    echo "<script>
            alert('Data siswa gagal dihapus!');
        </script>";
}
?>
