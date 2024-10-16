<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['namabarang'])) {
        // Ambil data dari input form menggunakan GET
        $nama_barang = htmlspecialchars($_GET['namabarang']);
        $kuantitas = htmlspecialchars($_GET['kuantitas']);
        $metodepembayaran = htmlspecialchars($_GET['metodepembayaran']);

        // Tampilkan hasil input
        echo "<h2>Riwayat Pembelian:</h2>";
        echo "<p><strong>Nama Barang:</strong> " . $nama_barang . "</p>";
        echo "<p><strong>Kuantitas:</strong> " . $kuantitas . "</p>";
        echo "<p><strong>Metode Pembayaran yang Dipilih:</strong> " . ucfirst($metodepembayaran) . "</p>";
    }
    ?>

    <section class="form">
        <h2>FORM PEMBELIAN</h2>
        <form action="" method="get">

            <label for="namabarang">Nama Barang</label><br>
            <input type="text" id="namabarang" name="namabarang" required><br>

            <label for="kuantitas">Kuantitas</label><br>
            <input min="1" type="number" id="kuantitas" name="kuantitas" required><br>

            <label>Metode Pembayaran</label><br>
            <input type="radio" id="bsi" name="metodepembayaran" value="bsi" required>
            <label for="bsi">BSI</label><br>
            <input type="radio" id="dana" name="metodepembayaran" value="dana" required>
            <label for="dana">Dana</label><br><br>
            <input type="radio" id="GoPay" name="metodepembayaran" value="GoPay" required>
            <label for="GoPay">GoPay</label><br>
            <input type="radio" id="OVO" name="metodepembayaran" value="OVO" required>
            <label for="OVO">OVO</label><br>
            <input type="radio" id="BCA" name="metodepembayaran" value="BCA" required>
            <label for="BCA">BCA</label><br>
            <input type="radio" id="BRI" name="metodepembayaran" value="BRI" required>
            <label for="BRI">BRI</label><br>

            <div class="button">
                <button class="kirim" type="submit" value="Kirim">Kirim</button>
                <a href="index.html" class="back-button">Back</a>
            </div>
            

        </form>
    </section>

</body>
</html>
