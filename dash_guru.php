<?php
include('koneksi.php');
session_start();

if (!isset($_SESSION['noInduk'])) {
    header("location: dash_guru.php");
}

$noInduk = $_SESSION['noInduk'];


// Query untuk mengambil data berdasarkan NoInduk yang sedang login
$sql = "SELECT * FROM users WHERE noInduk = '$noInduk'";
$result = mysqli_query($conn, $sql);
$guru = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard e-Raport</title>
    <link rel="stylesheet" type="text/css" href="asset/dash_guru.css">
    <style>
        .content {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include "html/dash_guru.html" ?>
    <center>
        <div class="container">
            <header>
                <h1>Selamat Datang,
                    <?php echo $guru['nama']; ?>!
                </h1>
            </header>

            <section>
                <div class="profile">
                    <img src="asset/images/naruto.jpeg" alt="Profil">
                    <div class="profile-info">
                        <h2>
                            <?php echo $guru['nama']; ?>
                        </h2>
                        <p>No. Induk:
                            <?php echo $guru['noInduk']; ?>
                        </p>
                    </div>
                </div>

                <div class="dashboard">
                    <h2>Dashboard</h2>
                    <p>Selamat datang di Dashboard e-Raport. Di sini Anda dapat melihat dan mengelola informasi nilai siswa</p>
                    <p>Silakan pilih menu yang tersedia di panel sebelah atas kiri untuk memulai.</p>
                </div>
            </section>

            <footer>
                <p>&copy;
                    <?php echo date("Y"); ?> e-Raport. All rights reserved.
                </p>
            </footer>
        </div>

        <script src="asset/dash_guru.js"></script>
    </center>
</body>

</html>