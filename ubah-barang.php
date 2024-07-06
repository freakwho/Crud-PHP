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

$title = 'Ubah Data Barang';
include 'layout/header.php';

// Mengambil id_barang dari url
$id_barang = (int)$_GET['id_barang'];
$barang = select("SELECT * FROM barang WHERE id_barang= $id_barang")[0];

// Check apakah data berhasil ditambah
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
                alert('Data barang berhasil diubah');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data barang gagal diubah');
                document.location.href = 'index.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Barang</h1>

    <form action="" method="post">

        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" placeholder="Nama barang..." required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>" placeholder="Jumlah barang..." required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" placeholder="Harga barang..." required>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>