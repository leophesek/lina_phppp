<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informasi Toko Bunga</title>
</head>
<body>

<?php
// Deklarasi array berisi informasi bunga
$daftarBunga = array(
    array("Mawar", 15, 5000),
    array("Melati", 20, 4000),
    array("Anggrek", 10, 8000),
    array("Krisan", 25, 6000),
);

// Fungsi untuk menampilkan informasi bunga
function tampilkanBunga($daftarBunga)
{
    echo "<h2>Daftar toko Bunga:</h2>";
    echo "<form method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>Nama Bunga</th><th>Stok</th><th>Harga</th><th>Jumlah Pembelian</th></tr>";
    foreach ($daftarBunga as $bunga) {
        echo "<tr>";
        echo "<td>" . $bunga[0] . "</td>";
        echo "<td>" . $bunga[1] . "</td>";
        echo "<td>" . $bunga[2] . "</td>";
        echo "<td><input type='number' name='jumlah_" . strtolower($bunga[0]) . "' min='0' max='" . $bunga[1] . "'></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' value='Beli'>";
    echo "</form>";
}

// Memanggil fungsi untuk menampilkan informasi bunga
tampilkanBunga($daftarBunga);

// Proses ketika tombol beli ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Hasil Pembelian:</h2>";
    foreach ($daftarBunga as $bunga) {
        $inputField = 'jumlah_' . strtolower($bunga[0]);
        if (isset($_POST[$inputField]) && $_POST[$inputField] > 0) {
            $namaBunga = $bunga[0];
            $jumlahBeli = $_POST[$inputField];
            $hargaTotal = $jumlahBeli * $bunga[2];
            echo "Bunga: $namaBunga, Jumlah yang dibeli: $jumlahBeli, Harga Total: $hargaTotal <br>";
        }
    }
}
?>

</body>
</html>