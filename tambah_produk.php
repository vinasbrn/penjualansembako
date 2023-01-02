<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';}
    
?>
 

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
    <a href="profile.php">Profile</a>|
    <a href="data_produk.php">Data Produk</a>|
    <a href="data_customer.php">Data Customer</a>|
    <a href="logout.php">Logout</a>|

    <h1>Tambah Data Produk</h1>
    <form action="" method="POST">

        <input type="text" name="id" class="input-control" placeholder="ID Produk" required>
        <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
        <input type="text" name="harga" class="input-control" placeholder="Harga Produk" required>
        <textarea  name="deskripsi" class="input-control" placeholder="Deskripsi Produk"></textarea>
        <input type="text" name="stock" class="input-control" placeholder="Ketersediaan Produk" required>
        <input type="submit" name="submit" class="btn" >
   </form>

<?php 
    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];

        $insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES(
                      '".$id."',
                      '".$nama."',
                      '".$harga."',
                      '".$deskripsi."',
                      '".$stock."'
                      )");
        if($insert)
        {echo '<script>alert("Tambah data produk berhasil")</script>';
            echo  '<script>window.location="data_produk.php"</script>';}
        else echo 'gagal'.mysqli_error($conn);
        }
?>
</body>
</html>