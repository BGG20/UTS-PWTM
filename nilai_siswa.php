<?php
include 'koneksi.php';
include 'html/dash_siswa.html';

// Query untuk mengambil semua data dari tabel nilai
$sql = "SELECT * FROM nilai";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="asset/tampil_nilai.css">
    <link rel="stylesheet" type="text/css" href="asset/dash_siswa.css">
    <style>
        <style>table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h2>LAPORAN PENILAIAN AKHIR SEMESTER (PAS) GANJIL</h2>
            <h2>T.P 2019/2020</h2>
        </center>
        <table>
            <tr>
                <th>No.</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Deskripsi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $row['mata_pelajaran'] . '</td>
                        <td>' . $row['nilai'] . '</td>
                        <td>' . $row['predikat'] . '</td>
                        <td>' . $row['deskripsi'] . '</td>
                    </tr>
                ';
                $no++;
            }
            ?>
        </table>
    </div>
</body>

</html>