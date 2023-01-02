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
    <h1>Data Produk</h1>
    <p>Selamat datang <?php echo $_SESSION['admin_global']->nama_karyawan?> di halaman produk, silahkan memilih apa yang ingin anda lakukan dengan memilih menu yang tersedia </p>
    <a href="profile.php">Profile</a>|
    <a href="data_produk.php">Data Produk</a>|
    <a href="data_customer.php">Data Customer</a>|
    <a href="logout.php">Logout</a>|

    <p><a href="tambah_produk.php">Tambah Data Produk</a></p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Deskripsi Produk</th>
                <th>Stock Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $produk = mysqli_query($conn, "SELECT * FROM tb_produk ORDER BY id_produk DESC");
                if(mysqli_num_rows($produk) > 0){
                while($row = mysqli_fetch_array($produk)){
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['id_produk']?></td>
                <td><?php echo $row['nama_produk']?></td>
                <td><?php echo $row['harga_produk']?></td>
                <td><?php echo $row['deskripsi_produk']?></td>
                <td><?php echo $row['stock_produk']?></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id_produk']?>">Edit</a> || 
                    <a href="hapus_produk.php?idp=<?php echo $row ['id_produk']?>">Hapus</a>
                </td>
            </tr>
            <?php }} else{ ?>
                <tr>
                    <td colspan="7">Tidak ada data produk</td>
                </tr>
                
                <?php } ?> 
        </tbody>
    </table>
</body>
</html>