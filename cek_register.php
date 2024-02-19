<?php
// mengaktifkan session pada php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Now, you can use var_dump() to ensure that the form data is being received correctly
    var_dump($nama);
    var_dump($username);
    var_dump($password);
    var_dump($role);

$koneksi = mysqli_connect("localhost","root","","ukk_kasir");

// mengeksekusi perintah SQL untuk memasukkan data ke database 
$login = mysqli_query($koneksi,"INSERT INTO petugas VALUES ('', '$nama', '$username', '$password', '$role')");
if ($login) {     
    echo "Query executed successfully"; 
} else {     
    echo "Error: " . mysqli_error($koneksi); 
}
}
?>