<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data
    $koneksi->query("DELETE FROM data_projek WHERE id_projek = '$id'");
    
    echo "Data berhasil dihapus!";
    header("Location: index.php"); // Redirect setelah hapus
} else {
    echo "ID tidak ditemukan.";
}