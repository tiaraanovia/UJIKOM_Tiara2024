
<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$sql = "UPDATE pelanggan set `NamaPelanggan` = '$NamaPelanggan', `NomorTelepon`='$NomorTelepon', `Alamat`='$Alamat' where `PelangganID`='$PelangganID'";
// update data ke database
mysqli_query($koneksi,$sql);

// mengalihkan halaman kembali ke data_barang.php
header("location: pembelian.php");
?>