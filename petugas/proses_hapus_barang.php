<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$ProdukID = $_GET['id'];

$sql = "DELETE FROM produk WHERE ProdukID = '$ProdukID'";
// menghapus data dari database
mysqli_query($koneksi, $sql);

// mengalihkan halaman kembali ke data_barang.php

header("location:data_barang.php?pesan=hapus");

?>