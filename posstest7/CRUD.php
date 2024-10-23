<?php 
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST["nama_barang"];
    $jumlah_barang = $_POST["jumlah_barang"];
    $harga = $_POST["harga"];
    $file_name = "";

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = basename($_FILES['file']['name']);
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = "uploads/" . $file_name;

        // Move the file to the specified directory
        if (!move_uploaded_file($file_tmp, $file_destination)) {
            echo "<script>alert('File upload failed');</script>";
            $file_name = ""; // Reset file name if upload fails
        }
    }

    $sql = "INSERT INTO katalog (nama_barang, jumlah_barang, harga, file) VALUES ('$nama_barang', '$jumlah_barang', '$harga', '$file_name')";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script>alert('Data berhasil ditambah');</script>";
        header("Location: CRUD.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}

$hasil = $conn->query("SELECT * FROM katalog");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD dengan Upload File</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <input type="text" name="nama_barang" placeholder="Masukkan nama barang" required>
        <input type="number" name="jumlah_barang" placeholder="Masukkan jumlah barang" required>
        <input type="number" name="harga" placeholder="Masukkan harga barang" required>
        <input type="file" name="file">
        <button type="submit" class="btn">Kirim</button>
    </form>

    <?php while ($data = $hasil->fetch_assoc()): ?>
        <div>Nama Barang: <?= $data["nama_barang"] ?></div>
        <div>Jumlah Barang: <?= $data["jumlah_barang"] ?></div>
        <div>Harga Barang: Rp<?= $data["harga"] ?></div>
        <div>File: 
            <?php if (!empty($data["file"])): ?>
                <a href="uploads/<?= $data['file'] ?>" download><?= $data["file"] ?></a>
            <?php else: ?>
                Tidak ada file
            <?php endif; ?>
        </div>
        <a href="edit.php?id=<?= $data['id'] ?>">Edit</a>
        <a href="hapus.php?id=<?= $data['id'] ?>">Hapus</a>
        <hr>
    <?php endwhile; ?>
</body>
</html>
