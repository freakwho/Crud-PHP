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

$title = 'Hapus Data Mahasiswa';
include 'config/app.php';

// Menerima id mahasiswa yang dipilih pengguna
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
                alert('Data Mahasiswa berhasil dihapus');
                document.location.href = 'mahasiswa.php';
            </script>";
} else {
    echo "<script>
                alert('Data Mahasiswa gagal dihapus');
                document.location.href = 'mahasiswa.php';
            </script>";
}
