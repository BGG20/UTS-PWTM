<?php
// Include file koneksi ke database
include 'koneksi.php';

// Memproses data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $output = ""; // Variabel untuk menyimpan pesan keluaran

    // Memproses data untuk setiap mata pelajaran
    for ($i = 1; $i <= 15; $i++) {
        $mataPelajaran = $_POST["mata_pelajaran" . $i];
        $nilai = $_POST["nilai" . $i];
        $predikat = $_POST["predikat" . $i];
        $deskripsi = $_POST["deskripsi" . $i];

        // Menyimpan data ke database
        $sql = "INSERT INTO nilai (mata_pelajaran, nilai, predikat, deskripsi) VALUES ('$mataPelajaran', '$nilai', '$predikat', '$deskripsi')";

        if ($conn->query($sql) === TRUE) {
            $output .= "Data mata pelajaran ke-$i berhasil disimpan.<br>";
        } else {
            $output = "Error: " . $sql . "<br>" . mysqli_error($conn);
            break; // Menghentikan loop jika terjadi kesalahan
        }
    }

    // Menutup koneksi ke database
    $conn->close();
    
    // Menampilkan keluaran sebagai popup menggunakan JavaScript
    echo "<script>alert('$output');</script>";

     // Redirect ke halaman dashboard jika tidak terjadi kesalahan
    if (empty($output)) {
        echo "<script>window.location.href = 'dash_guru.php';</script>";
    }
}
?>
