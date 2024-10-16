<?php
include "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM katalog WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST["nama_barang"];
    $jumlah_barang = $_POST["jumlah_barang"];
    $harga = $_POST["harga"];
    $file_name = $data['file'];

    
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = basename($_FILES['file']['name']);
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = "uploads/" . $file_name;
        move_uploaded_file($file_tmp, $file_destination);
    }

    $sql = "UPDATE katalog SET nama_barang='$nama_barang', jumlah_barang='$jumlah_barang', harga='$harga', file='$file_name' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil diubah');</script>";
        header("Location: CRUD.php");
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
        <form action="" method = "post" class = "form" >
            <input values="<?php echo $result['nama_barang']?>" type="text" name = "nama_barang" placeholder = "masukkan nama barang"> 
            <input values="<?php echo $result['jumlah_barang']?>" type="number" name = "jumlah_barang" placeholder = "masukkan jumlah barang"> 
            <input values="<?php echo $result['harga']?>" type="number" name = "harga" placeholder = "masukkan harga barang"> 
            <button type="submit" class = "btn">kirim</button>
        </form>    
</body>
</html>