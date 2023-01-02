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

    <h1>Tambah Data Customer</h1>
    <form action="" method="POST">

        <input type="text" name="id" class="input-control" placeholder="No Pesanan" required>
        <input type="text" name="customer" class="input-control" placeholder="Nama Customer" required>
        <input type="text" name="telp" class="input-control" placeholder="Telp" required>
        <input type="text" name="produk" class="input-control" placeholder="Produk" required>
        <input type="text" name="qty" class="input-control" placeholder="Qty" required>
        <input type="text" name="harga" class="input-control" placeholder="Harga" required>
        <input type="text" name="total" class="input-control" placeholder="Total" required>
        <input type="submit" name="submit" class="btn" >
   </form>

    <?php 
    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $cust = $_POST['customer'];
        $telp = $_POST['telp'];
        $produk = $_POST['produk'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $total = $_POST['total'];

        $insert = mysqli_query($conn, "INSERT INTO tb_customer VALUES(
                      '".$id."',
                      '".$cust."',
                      '".$telp."',
                      '".$produk."',
                      '".$qty."',
                      '".$harga."',
                      '".$total."'
                      )");
        if($insert)
        {echo '<script>alert("Tambah Data Customer Berhasil")</script>';
            echo  '<script>window.location="data_customer.php"</script>';}
        else echo 'gagal'.mysqli_error($conn);
        }
    ?>
</body>
</html>