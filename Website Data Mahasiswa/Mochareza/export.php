<?php
// Memanggil atau membutuhkan file function.php yang berisi fungsi-fungsi yang diperlukan
require 'function.php';

// Mengambil semua data dari tabel mahasiswa dan mengurutkannya berdasarkan NIM secara menurun
$siswa = query("SELECT * FROM mahasiswa ORDER BY nim DESC");              

// Mengatur header untuk mengindikasikan bahwa file ini adalah file Excel
// dan mengatur nama file untuk unduhan
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");

?>
<!-- Judul dokumen Excel -->
<h3>DM DATABASE</h3>

<!-- Membuat tabel dengan border untuk menyusun data mahasiswa -->
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <!-- Header kolom tabel -->
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; // Variabel untuk nomor urut baris ?>
        <!-- Mengulangi setiap baris data mahasiswa dan menampilkannya dalam tabel -->
        <?php foreach ($siswa as $row) : ?>
            <tr>
                <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                <td><?= $row['nim']; ?></td> <!-- Menampilkan NIM mahasiswa -->
                <td><?= $row['nama']; ?></td> <!-- Menampilkan nama mahasiswa -->
                <td><?= $row['jenis_kelamin']; ?></td> <!-- Menampilkan jenis kelamin mahasiswa -->
                <td><?= $row['kelas']; ?></td> <!-- Menampilkan kelas mahasiswa -->
                <td><?= $row['jurusan']; ?></td> <!-- Menampilkan jurusan mahasiswa -->
                <td><?= $row['semester']; ?></td> <!-- Menampilkan semester mahasiswa -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
