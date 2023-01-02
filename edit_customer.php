<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';}
    
$customer = mysqli_query($conn, "SELECT * FROM tb_customer WHERE no_pesanan = '".$_GET['id']."' ");
$c = mysqli_fetch_object($customer);

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

    <h1>Edit Data Customer</h1>
    <form action="" method="POST">
    <input type="text" name="no" placeholder="No Pesanan" class="input_control" required>
    <input type="text" name="nama" placeholder="Nama Customer" class="input_control" required>
    <input type="text" name="telp" placeholder="Telp" class="input_control" required>
    <input type="text" name="produk" placeholder="Produk" class="input_control" required>
    <input type="text" name="qty" placeholder="Qty" class="input_control" required>
    <input type="text" name="harga" placeholder="Harga" class="input_control" required>
    <input type="text" name="total" placeholder="Total" class="input_control" required>
    <input type="submit" name="submit" class>
   </form>
   
<?php 
    if(isset($_POST['submit'])){

        $no = ucwords($_POST['no']);
        $nama = ($_POST['nama']);
        $telp = ucwords($_POST['telp']);
        $produk = ucwords($_POST['produk']);
        $qty = ucwords($_POST['qty']);
        $harga = ucwords($_POST['harga']);
        $total = ucwords($_POST['total']);

        $update = mysqli_query($conn, "UPDATE tb_customer SET 
                                no_pesanan = '".$no."',
                                nama_customer = '".$nama."',
                                telp = '".$telp."',
                                produk = '".$produk."',
                                qty = '".$qty."',
                                harga = '".$harga."',
                                total = '".$total."'
                                WHERE no_pesanan = '".$c->no_pesanan."'");

        if($update)
        {echo '<script>alert("Update Data Customer Berhasil")</script>';
        echo  '<script>window.location="edit_customer.php"</script>';}
        else echo 'Gagal'.mysqli_error($conn);
    } ?>
</body>
</html>