<?php
session_start();
include 'koneksi.php';
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
    <h1>Data Profile</h1>
    <p>Selamat datang <?php echo $_SESSION['admin_global']->nama_karyawan?> di halaman profile, silahkan memilih apa yang ingin anda lakukan dengan memilih menu yang tersedia </p>
    <a href="profile.php">Profile</a>|
    <a href="data_produk.php">Data Produk</a>|
    <a href="data_customer.php">Data Customer</a>|
    <a href="logout.php">Logout</a>|

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Umur</th>
                <th>Telp</th>
                <th>Email Karyawan</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $kategori = mysqli_query($conn, "SELECT * FROM tb_karyawan ORDER BY id_karyawan DESC");
                while($row = mysqli_fetch_array($kategori)){
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['id_karyawan']?></td>
                <td><?php echo $row['nama_karyawan']?></td>
                <td><?php echo $row['umur']?></td>
                <td><?php echo $row['telp']?></td>
                <td><?php echo $row['email_karyawan']?></td>
                <td><?php echo $row['username']?></td>
                <td>
                    <a href="update_profile.php?id=<?php echo $row['id_karyawan']?>">Update Profile</a> | 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>