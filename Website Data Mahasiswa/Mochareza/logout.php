<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// Session dihapus dan logout

header('location: indexmahasiswa.php');
    // kembali ke index.php