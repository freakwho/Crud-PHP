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

$title = 'Tambah Mahasiswa';
include 'layout/header.php';

// Check apakah data berhasil ditambah
if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan');
                document.location.href = 'mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan');
                document.location.href = 'mahasiswa.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama mahasiswa..." required>
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi..." required>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
            </div>
        </div>

        <div class="mb-3">
            <label for="ok" class="form-label"></label>
            <input type="text" placeholder="No Rainbow..." disabled>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat"></textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="PreviewImg()">

            <img src="" alt="" class="img-thumbnail img-preview mt-3" width="100px">
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

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>