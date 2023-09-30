<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "data_siswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>