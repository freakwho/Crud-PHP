<?php

// render  halaman menjadi json
header('Content-Type: application/json');

require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);

// Menerima Input
$id_barang  = $put['id_barang'];
$nama       = $put['nama'];
$jumlah     = $put['jumlah'];
$harga      = $put['harga'];

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
$query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// Check Status Data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Diubah']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Diubah']);
}
