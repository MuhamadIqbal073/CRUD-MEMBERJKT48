<?php
session_start();

require('koneksi.php');

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ganti kode berikut sesuai dengan mekanisme autentikasi Anda
    $valid_username = "username"; // Ganti dengan username yang benar
    $valid_password = "password"; // Ganti dengan password yang benar

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: data_siswa.php"); // Ganti dengan halaman setelah login berhasil
        exit();
    } else {
        // Autentikasi gagal
        header("Location: data_siswa.php?login_error=true"); // Redirect kembali ke halaman login dengan pesan kesalahan
        exit();
    }
}

$koneksi->close();
?>
