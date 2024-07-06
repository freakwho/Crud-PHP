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

// Membatasi Halaman sesuai user login
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
    echo "<script>
            alert('Perhatioan anda tidak punya hak akses');
            document.location.href = 'index.php';
          </script>";
    exit;
}

$title = 'Daftar Mahasiswa';
include 'layout/header.php';

// menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<div class="container mt-5">
    <h1><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Data Mahasiswa</h1>
    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah</a>

    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i>&nbsp;Download Excel</a>

    <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i>&nbsp;Download PDF</a>

    <table class="table table-bordered table-striped mt-3" id="satu">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mahasiswa['nama']; ?></td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                    <td><?= $mahasiswa['jk']; ?></td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                    <td class="text-center" width="22%">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-info mb-1"><i class="fas fa-info"></i>&nbsp;Detail</a>
                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success mb-1"><i class="fas fa-pencil-alt"></i>&nbsp;Ubah</a>
                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger mb-1" onclick="return confirm('yakin ?');"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>