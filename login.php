<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan | penjualansembako</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400">
    <h1>Login</h1>
    <form action="" method="POST">
                <label>Username</label><br>
                <input type="text" name="user"><br>
                <label>Password</label><br>
                <input type="password" name="pass"><br>
                <input type="submit" name="login" value="login"><br>
    </form>

    <?php 
        if(isset($_POST['login'])){
            session_start();
         include 'koneksi.php';
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $cek = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE username = '".$user."' AND password= '".$pass."'");
        if(mysqli_num_rows($cek) > 0){
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['admin_global'] = $d;
            $_SESSION['id'] = $d->admin_id; 
            echo '<script>window.location="dashboard.php"</script>';}
        else
            {echo '<script>alert("Username atau password anda salah")</script>';}
        }
    ?>
</body>
</html>