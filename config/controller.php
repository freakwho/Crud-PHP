<?php

// Fungsi Menampilkan
function select($query)
{

    // Panggil Koneksi Database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi menambahkan data barang
function create_barang($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);
    $barcode    = rand(100000, 999999);

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang  = $post['id_barang'];
    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);

    // query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // Query Menghapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi menambahkan data mahasiswa
function create_mahasiswa($post)
{
    global $db;

    // strip_tags dan htmlspecialchars berfungsi untuk mengamankan dari injeksi input
    $nama    = htmlspecialchars($post['nama']);
    $prodi   = strip_tags($post['prodi']);
    $jk      = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $alamat  = $post['alamat'];
    $email   = strip_tags($post['email']);
    $foto    = upload_file();

    // Validasi Upload File
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Mengubah Data Mahasiswa
function update_mahasiswa($post)
{
    global $db;

    // strip_tags dan htmlspecialchars berfungsi untuk mengamankan dari injeksi input
    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama     = htmlspecialchars($post['nama']);
    $prodi    = strip_tags($post['prodi']);
    $jk       = strip_tags($post['jk']);
    $telepon  = strip_tags($post['telepon']);
    $alamat   = $post['alamat'];
    $email    = strip_tags($post['email']);
    $fotoLama = strip_tags($post['fotoLama']);

    // Validasi Upload File
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi Upload File
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Check File yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    // explode . $namaFile => Memberi Extensi Format
    $extensifile      = explode('.', $namaFile);
    // Mengkonversi huruf Extensi File menjadi huruf kecil semua
    $extensifile      = strtolower(end($extensifile));

    // Cek extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alerts('Format File Salah');
                document.location.href = 'tambah-mahasiswa.php';        
            </script>";
        die();
    }

    // Cek Ukuran File
    if ($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
                alerts('Ukuran File Max 2 MB');
                document.location.href = 'tambah-mahasiswa.php';        
            </script>";
        die();
    }

    // Generate Nama File Baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // Pindahkan file upload ke folder lokal
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}

// Fungsi menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // Ambil data Foto dari URL
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/" . $foto['foto']);

    // Query Menghapus data barang
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi Menambahkan Akun
function create_akun($post)
{
    global $db;

    // strip_tags dan htmlspecialchars berfungsi untuk mengamankan dari injeksi input
    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    // Query Menghapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi mengubah data akun
function update_akun($post)
{
    global $db;

    $id_akun    = strip_tags($post['id_akun']);
    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email' , password = '$password' , level = '$level' WHERE id_akun = $id_akun";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
