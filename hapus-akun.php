<?php

session_start();

// Membatasi Halaman sebelum Login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('LOGIN First !!!');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = 'Hapus Data Akun';
include 'config/app.php';

// Menerima id akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];
if (delete_akun($id_akun) > 0) {
    echo "<script>
                alert('Data Akun berhasil dihapus');
                document.location.href = 'crud-modal.php';
            </script>";
} else {
    echo "<script>
                alert('Data Akun gagal dihapus');
                document.location.href = 'crud-modal.php';
            </script>";
}
