<?php

// render  halaman menjadi json
header('Content-Type: application/json');

require '../config/app.php';

// Menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

// Menerima Input id data yang akan dihapus
$id_barang = $delete['id_barang'];

// Query hapus data
$query = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// Check Status Data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Dihapus']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Dihapus']);
}
