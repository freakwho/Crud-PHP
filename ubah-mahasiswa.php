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

$title = 'Ubah Mahasiswa';
include 'layout/header.php';

// Check apakah data berhasil diubah
if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa berhasil diubah');
                document.location.href = 'mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal diubah');
                document.location.href = 'mahasiswa.php';
            </script>";
    }
}

// Ambil ID Mahasiswa dari URL
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// Query Ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

<div class="container mt-5">
    <h1>Ubah Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama mahasiswa..." required value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi..." required value="<?= $mahasiswa['prodi']; ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <?php $jk = $mahasiswa['jk']; ?>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
            </div>
        </div>

        <div class="mb-3">
            <label for="ok" class="form-label"></label>
            <input type="text" placeholder="No Rainbow..." disabled>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required value="<?= $mahasiswa['telepon']; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" required><?= $mahasiswa['alamat']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required value="<?= $mahasiswa['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="PreviewImg()">
            <img src="" alt="" class="img-thumbnail img-preview mt-3" width="100px">

            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="100px">

        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>

<!-- Preview Image -->
<script>
    function PreviewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>