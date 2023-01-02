<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';}
    
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);

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

    <h1>Edit Data Produk</h1>
    <form action="" method="POST">
    <input type="text" name="id" placeholder="ID Produk" class="input_control" required>
    <input type="text" name="nama" placeholder="Nama Produk" class="input_control" required>
    <input type="text" name="harga" placeholder="Harga Produk" class="input_control" required>
    <input type="text" name="desc" placeholder="Deskripsi Produk" class="input_control" required>
    <input type="text" name="stock" placeholder="Stock Produk" class="input_control" required>
    <input type="submit" name="submit" class>
   </form>
   
<?php 
    if(isset($_POST['submit'])){

        $id = ucwords($_POST['id']);
        $nama = ucwords($_POST['nama']);
        $harga = ($_POST['harga']);
        $desc = ucwords($_POST['desc']);
        $stock = ucwords($_POST['stock']);

        $update = mysqli_query($conn, "UPDATE tb_produk SET 
                                id_produk = '".$id."',
                                nama_produk = '".$nama."',
                                harga_produk = '".$harga."',
                                deskripsi_produk = '".$desc."',
                                stock_produk = '".$stock."'
                                WHERE id_produk = '".$p->id_produk."'");

        if($update)
        {echo '<script>alert("Update Data Produk Berhasil")</script>';
        echo  '<script>window.location="edit_produk.php"</script>';}
        else echo 'Gagal'.mysqli_error($conn);
    } ?>
</body>
</html>