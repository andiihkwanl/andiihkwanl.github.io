<?php 
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"]== "post"){
    $nama_barang = $_POST ["nama_barang"];
    $jumlah_barang = $_POST ["jumlah_barang"];
    $harga = $_POST ["harga"];
    $sql = "insert into katalog (nama_barang, jumlah_barang, harga) values('$nama_barang', '$jumlah_barang', '$harga')";
    $result = $conn->query($sql);
    if ($result){
        echo "<script>alert("data berhasil ditambah")</script>";
        header ("Location: CRUD.php");
        
    

    }else{
        echo "<script>alert("data gagal ditambahkan")</script>";
    }  
} 
$hasil = $conn->query("select * from katalog");
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
            <input type="text" name = "nama_barang" placeholder = "masukkan nama barang"> 
            <input type="number" name = "jumlah_barang" placeholder = "masukkan jumlah barang"> 
            <input type="number" name = "harga" placeholder = "masukkan harga barang">
            <button type="submit" class = "btn">kirim</button>
        </form>    
        <?php while ($data = $hasil->fetch_assoc()):?>
        <div>nama barang</div>
        <div><?= $data ["nama_barang"]?></div>
        <div>jumlah barang</div>
        <div><?= $data ["jumlah_barang"]?></div>
        <div>harga barang</div>
        <div><?= $data ["harga"]?></div>
        <a href="edit.php?id=<?= $data['id']?>">edit</a>
        <a href="hapus.php?id=<?= $data['id']?>">hapus</a>
        <?php endwhile; ?>
</body>
</html>


