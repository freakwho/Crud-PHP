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

?>

<div class="container mt-5">
    <h1><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Data Pegawai</h1>
    <table class="table table-bordered table-striped mt-3" id="satu">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody id="live_data">

        </tbody>
    </table>
</div>

<script>
    $('document').ready(function() {
        setInterval(function() {
            getPegawai()
        }, 200) // request per 2 detik
    });

    function getPegawai() {
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET",
            success: function(response) {
                $('#live_data').html(response)
            }
        });
    }
</script>

<?php include 'layout/footer.php'; ?>