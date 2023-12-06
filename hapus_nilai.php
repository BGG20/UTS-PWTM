<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $output = ""; // Variabel untuk menyimpan pesan keluaran

    // Menghapus data untuk setiap mata pelajaran
    for ($i = 1; $i <= 15; $i++) {
        $nilaiId = $_POST["nilai_id" . $i];

        // Menghapus data dari database
        $sql = "DELETE FROM nilai WHERE id = '$nilaiId'";

        if ($conn->query($sql) === TRUE) {
            $output .= "Data mata pelajaran ke-$i berhasil dihapus.<br>";
        } else {
            $output = "Error: " . $sql . "<br>" . mysqli_error($conn);
            break; // Menghentikan loop jika terjadi kesalahan
        }
    }

    // Menutup koneksi ke database
    $conn->close();

    // Menampilkan keluaran sebagai popup menggunakan JavaScript
    echo "<script>alert('$output');</script>";

    // Redirect ke halaman read_nilai.php jika tidak terjadi kesalahan
    if (!empty($output)) {
        echo "<script>window.location.href = 'tampil_nilai.php';</script>";
    }
} else {
    // Mengambil data nilai dari database
    $sql = "SELECT * FROM nilai";
    $result = mysqli_query($conn, $sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hapus Nilai</title>
        <link rel="stylesheet" href="asset/hapus_nilai.css">
        <link rel="stylesheet" type="text/css" href="asset/dash_guru.css">
    </head>

    <body>
        <div class="container">
            <h2>Hapus Nilai Mata Pelajaran</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                        <th>Predikat</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
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
                    <td>
                        <input type="hidden" name="nilai_id' . $no . '" value="' . $row['id'] . '">
                        <button type="submit" name="hapus">Hapus</button>
                    </td>
                </tr>
                ';
                        $no++;
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>

    </html>
    <?php
}
?>