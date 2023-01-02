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
    <h1>Data Customer</h1>
    <p>Selamat datang <?php echo $_SESSION['admin_global']->nama_karyawan?> di halaman customer, silahkan memilih apa yang ingin anda lakukan dengan memilih menu yang tersedia </p>
    <a href="profile.php">Profile</a>|
    <a href="data_produk.php">Data Produk</a>|
    <a href="data_customer.php">Data Customer</a>|
    <a href="logout.php">Logout</a>|

    <p><a href="tambah_customer.php">Tambah Data Customer</a></p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>No Pesanan</th>
                <th>Nama Customer</th>
                <th>Telp</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $produk = mysqli_query($conn, "SELECT * FROM tb_customer ORDER BY no_pesanan DESC");
                if(mysqli_num_rows($produk) > 0){
                while($row = mysqli_fetch_array($produk)){
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['no_pesanan']?></td>
                <td><?php echo $row['nama_customer']?></td>
                <td><?php echo $row['telp']?></td>
                <td><?php echo $row['produk']?></td>
                <td><?php echo $row['qty']?></td>
                <td><?php echo $row['harga']?></td>
                <td><?php echo $row['total']?></td>
                <td>
                    <a href="edit_customer.php?id=<?php echo $row['no_pesanan']?>">Edit</a> || 
                    <a href="hapus_customer.php?idc=<?php echo $row ['no_pesanan']?>">Hapus</a>
                </td>
            </tr>
            <?php }} else{ ?>
                <tr>
                    <td colspan="9">Tidak ada data customer</td>
                </tr>
                
                <?php } ?> 
        </tbody>
    </table>
</body>
</html>