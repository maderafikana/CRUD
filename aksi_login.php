<?php
$errors = array();
// Validasi username
if (empty($_POST['username'])) {
    $errors['username'] = 'Username harus diisi';
}
// Validasi password
if (empty($_POST['password'])) {
    $errors['password'] = 'Password harus diisi';
}
if (count($errors) === 0) {
    include "koneksi.php";
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Query untuk memerika data pengguna
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($link, $query);
    // Cek hasil query
    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        session_start();
        $_SESSION['status'] = 'Login';
        header("Location: tampil_data.php");
    } else {
        // Login gagal, redirect kembali ke halaman login
        header("Location: index.php");
    }
} else {
    // Jika terdapat error, kembali ke halaman form dengan menampilkan error
    include "koneksi.php";
}
?>