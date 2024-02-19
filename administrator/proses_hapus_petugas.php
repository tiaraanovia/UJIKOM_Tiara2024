<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id_petugas = $_GET['id'];

$sql = "DELETE from petugas where `id_petugas` = '$id_petugas'";
// menghapus data dari database
mysqli_query($koneksi,$sql);

// mengalihkan halaman kembali ke data_barang.php
header("Location: data_pengguna.php?pesan=hapus");

?>