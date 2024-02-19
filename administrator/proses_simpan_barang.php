<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];
$ekstensi_diperbolehkan = array('png','jpg','jpeg');

     $nama_photo = $_FILES['photo']['name'];
 
     $x = explode('.', $nama_photo);

     $ekstensi = strtolower(end($x));
    //endapatkan ukurran 
     $ukuran = $_FILES ['photo']['size'];

    //untuk mendapatkan tempory file yang di uplod
     $file_tmp = $_FILES['photo']['tmp_name']; 

     //menegecek ekstensi yang di buat
     if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){

        if( $ukuran < 1044070){
            move_uploaded_file($file_tmp,'../assets/img/'. $nama_photo);

            // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
            // $barang->tambah_barang($id = 0, $nama, $qty, $harga, $nama_photo);
            mysqli_query($koneksi,"insert into produk values('','$NamaProduk','$Harga','$Stok','$nama_photo')");

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
    }
// menginput data ke database
// mysqli_query($koneksi,"insert into produk values('','$NamaProduk','$Harga','$Stok')");

// mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=simpan");

?>