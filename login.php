<?php
include('koneksi.php');
session_start();
if (isset($_SESSION['noInduk'])) {
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noInduk = mysqli_real_escape_string($conn, $_POST['noInduk']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // check nis
    // if (strlen($noInduk)) {
        
    // }
    $query = mysqli_query($conn, "SELECT * FROM users WHERE noInduk = '$noInduk' ");
    $fect = mysqli_fetch_assoc($query);

    if ($fect) {
        // check password

        $check = password_verify($password, $fect['password']);
        if ($check) {
            // buat session
            $_SESSION['login'] = true;
            $_SESSION['id'] = $fect['id'];
            $_SESSION['noInduk'] = $fect['noInduk'];
            $_SESSION['nama'] = $fect['nama'];
            $_SESSION['role'] = $fect['role'];

            // check role
            if ($fect['role'] == "Guru") {
                // login guru
                header("Location: dash_guru.php");
            } elseif ($fect['role'] == "Siswa") {
                // login siswa
                header("Location: dash_siswa.php");
            }


        } else {
            $error = "NIS/NIP atau password salah";
        }
    } else {
        $error = "NIS/NIP atau password salah";
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e-Raport</title>
    <link rel="stylesheet" href="asset/login.css">

</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="asset/images/logosma.png" alt="">
            </div>
            <h1>Login</h1>
            <?php if (isset($error)): ?>
                <script>
                    alert("NIS/NIP atau Password Salah");       
                </script>
            <?php endif; ?>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="user-box">
                    <label for="">NIS/NIP</label><br>
                    <input type="text" placeholder="NIS/NIP" name="noInduk" required="">
                </div>
                <div class="user-box">
                    <label for="">Password</label><br>
                    <input type="password" placeholder="Password" name="password" required="">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>