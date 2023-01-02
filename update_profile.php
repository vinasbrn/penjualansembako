<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';}
    
$karyawan = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$_GET['id']."' ");
$k = mysqli_fetch_object($karyawan);

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

    <h1>Edit Data Profile</h1>
    <form action="" method="POST">
    <input type="text" name="id" placeholder="ID Karyawan" class="input_control" required>
    <input type="text" name="nama" placeholder="Nama Karyawan" class="input_control" required>
    <input type="text" name="umur" placeholder="Umur" class="input_control" required>
    <input type="text" name="telp" placeholder="Telp" class="input_control" required>
    <input type="text" name="email" placeholder="Email Karyawan" class="input_control" required>
    <input type="text" name="username" placeholder="Username" class="input_control" required>
    <input type="password" name="pass" placeholder="Password" class="input_control" required>
    <input type="submit" name="submit" class>
   </form>
   
<?php 
    if(isset($_POST['submit'])){

        $id = ucwords($_POST['id']);
        $nama = ucwords($_POST['nama']);
        $umur = ($_POST['umur']);
        $telp = ucwords($_POST['telp']);
        $email = ucwords($_POST['email']);
        $username = ucwords($_POST['username']);
        $pass = ucwords($_POST['pass']);

        $update = mysqli_query($conn, "UPDATE tb_karyawan SET 
                                id_karyawan = '".$id."',
                                nama_karyawan = '".$nama."',
                                umur = '".$umur."',
                                telp = '".$telp."',
                                email_karyawan= '".$email."',
                                username = '".$username."',
                                password= '".$pass."'
                                WHERE id_karyawan = '".$k->id_karyawan."'");

        if($update)
        {echo '<script>alert("Update Profile Berhasil")</script>';
        echo  '<script>window.location="profile.php"</script>';}
        else echo 'Gagal'.mysqli_error($conn);
    } ?>
</body>
</html>