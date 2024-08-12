<?php
// Koneksi Database
$servername = "localhost"; // Nama server database
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database
$dbname = "db_mahasiswa"; // Nama database

// Membuat koneksi ke database
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Membuat fungsi query yang mengambil data dari database dan mengembalikannya dalam bentuk array
function query($query)
{
    global $koneksi; // Mengakses variabel koneksi dari luar fungsi

    // Menjalankan query ke database
    $result = mysqli_query($koneksi, $query);

    // Membuat variabel array untuk menyimpan hasil query
    $rows = [];

    // Mengambil semua baris data hasil query dalam bentuk array asosiatif
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // Mengembalikan array yang berisi data dari query
    return $rows;
}

// Membuat fungsi untuk menambahkan data mahasiswa ke database
function tambah($data)
{
    global $koneksi; // Mengakses variabel koneksi dari luar fungsi

    // Mengambil data dari parameter dan membersihkan karakter berbahaya
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    // Menyusun query SQL untuk menyimpan data ke database
    $sql = "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, kelas, jurusan, semester) VALUES ('$nim', '$nama', '$jenis_kelamin', '$kelas', '$jurusan', '$semester')";

    // Menjalankan query ke database
    mysqli_query($koneksi, $sql);

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi untuk menghapus data mahasiswa dari database
function hapus($nim)
{
    global $koneksi; // Mengakses variabel koneksi dari luar fungsi

    // Menyusun query SQL untuk menghapus data berdasarkan NIM
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi untuk mengubah data mahasiswa di database
function ubah($data)
{
    global $koneksi; // Mengakses variabel koneksi dari luar fungsi

    // Mengambil data dari parameter dan membersihkan karakter berbahaya
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    // Menyusun query SQL untuk memperbarui data berdasarkan NIM
    $sql = "UPDATE mahasiswa SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' WHERE nim = '$nim'";

    // Menjalankan query ke database
    mysqli_query($koneksi, $sql);

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($koneksi);
}
