<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-sky-400 via-rose-400 to-lime-400">
    <h1>penjualansembako</h1>
    <p>Selamat datang <?php echo $_SESSION['admin_global']->nama_karyawan?> di halaman dashboard, silahkan memilih apa yang ingin anda lakukan dengan memilih menu yang tersedia </p>
    <a href="profile.php">Profile</a>|
    <a href="data_produk.php">Data Produk</a>|
    <a href="data_customer.php">Data Customer</a>|
    <a href="logout.php">Logout</a>|
</body>
</html>