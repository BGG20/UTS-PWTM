<?php
include 'html/dash_guru.html';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <link rel="stylesheet" href="asset/input_nilai.css">

</head>

<body>
    <div class="container">
        <h2>Input Nilai Mata Pelajaran</h2>
        <form action="tambah_nilai.php" method="POST">
            <table>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                    <th>Deskripsi</th>
                </tr>
                <?php
                for ($i = 1; $i <= 15; $i++) {
                    echo '
                <tr>
                    <td>
                        <input type="text" id="mata_pelajaran' . $i . '" name="mata_pelajaran' . $i . '" required>
                    </td>
                    <td>
                        <input type="text" id="nilai' . $i . '" name="nilai' . $i . '" required>
                    </td>
                    <td>
                        <select id="predikat' . $i . '" name="predikat' . $i . '" required>
                            <option value="">- Pilih Predikat -</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </td>
                    <td>
                        <textarea id="deskripsi' . $i . '" name="deskripsi' . $i . '" rows="4" required></textarea>
                    </td>
                </tr>
                ';
                }
                ?>
            </table>
            <button type="submit">Simpan</button>
        </form>

    </div>
</body>

</html>