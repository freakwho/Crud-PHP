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

include 'config/app.php';

// menampilkan data Pegawai
$data_mahasiswa = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<?php $no = 1; ?>
<?php foreach ($data_mahasiswa as $mahasiswa) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $mahasiswa['nama']; ?></td>
        <td><?= $mahasiswa['jabatan']; ?></td>
        <td><?= $mahasiswa['email']; ?></td>
        <td><?= $mahasiswa['telepon']; ?></td>
        <td><?= $mahasiswa['alamat']; ?></td>
    </tr>
<?php endforeach; ?>