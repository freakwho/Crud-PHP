<?php

// render  halaman menjadi json
header('Content-Type: application/json');

require '../config/app.php';

// Menerima Input
$nama   = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga  = $_POST['harga'];

// Validasi Data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama Barang Tidak Boleh Kosong']);
    exit;
} elseif ($jumlah == null) {
    echo json_encode(['pesan' => 'Jumlah Barang Tidak Boleh Kosong']);
    exit;
} elseif ($harga == null) {
    echo json_encode(['pesan' => 'Harga Barang Tidak Boleh Kosong']);
    exit;
}

// Query tambah data
$query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

// Check Status Data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Ditambahkan']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Ditambahkan']);
}
