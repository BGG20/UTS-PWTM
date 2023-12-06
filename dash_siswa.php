<?php
include('koneksi.php');
session_start();

if (!isset($_SESSION['noInduk'])) {
    header("location: dash_siswa.php");
}

$noInduk = $_SESSION['noInduk'];
// Query untuk mengambil data siswa berdasarkan NIS yang sedang login
$sql = "SELECT * FROM users WHERE noInduk = '$noInduk'";
$result = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard e-Raport</title>
    <link rel="stylesheet" type="text/css" href="asset/dash_siswa.css">
    
</head>

<body>
<?php include "html/dash_siswa.html" ?>
<center>
        <div class="container">
            <header>
                <h1>Selamat Datang,
                    <?php echo $siswa['nama']; ?>!
                </h1>
            </header>

            <section>
                <div class="profile">
                    <img src="asset/images/boruto.jpeg" alt="Profil">
                    <div class="profile-info">
                        <h2>
                            <?php echo $siswa['nama']; ?>
                        </h2>
                        <p>No. Induk:
                            <?php echo $siswa['noInduk']; ?>
                        </p>
                    </div>
                </div>

                <div class="dashboard">
                    <h2>Dashboard</h2>
                    <p>Selamat datang di Dashboard e-Raport. Di sini Anda dapat melihat informasi nilai siswa</p>
                    <p>Silakan pilih menu yang tersedia di panel sebelah atas kiri untuk memulai.</p>
                </div>
            </section>

            <footer>
                <p>&copy;
                    <?php echo date("Y"); ?> e-Raport. All rights reserved.
                </p>
            </footer>
        </div>

        <script src="asset/dash_siswa.js"></script>
    </center>

</body>

</html>