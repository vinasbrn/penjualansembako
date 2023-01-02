<?php
include 'koneksi.php';

if(isset($_GET['idp'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk = '".$_GET['idp']."' ");
    echo '<script>window.location="data_produk.php"</script>';
}

?>