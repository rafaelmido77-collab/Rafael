<?php
$server    = "localhost";
$pengguna  = "root";
$password  = "";
$database  = "perpustakaan10";

$koneksi = mysqli_connect($server, $pengguna, $password, $database);
if(!$koneksi){
    echo "Koneksi Error : ".mysqli_error($koneksi);
}
?>
