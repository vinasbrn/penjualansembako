<?php
include 'koneksi.php';

if(isset($_GET['idc'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_customer WHERE no_pesanan = '".$_GET['idc']."' ");
    echo '<script>window.location="data_customer.php"</script>';
}

?>