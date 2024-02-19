
<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$ProdukID = $_POST['ProdukID'];
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
            $sql = "UPDATE produk set NamaProduk='$NamaProduk', Poster='$nama_photo', Harga='$Harga', Stok='$Stok' where ProdukID = '$ProdukID'";

            // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
            // $barang->tambah_barang($id = 0, $nama, $qty, $harga, $nama_photo);
            mysqli_query($koneksi,$sql);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
    }

// update data ke database
// mengalihkan halaman kembali ke data_barang.php
header("location: data_barang.php");

?>