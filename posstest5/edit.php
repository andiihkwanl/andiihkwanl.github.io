<?php 
include "koneksi.php";


$id = $_GET['id'];
$result = $conn->query("select * from katalog where id='$id'")->fetch_assoc();

if($_SERVER["REQUEST_METHHOD"]=="post"){
    $nama_barang = $_POST ["nama_barang"];
    $jumlah_barang = $_POST ["jumlah_barang"];
    $harga = $_POST ["harga"];
    $sql = "update katalog set nama_barang='$nama_barang' jumlah_barang= '$jumlah_barang' harga = '$harga'";
    $result = $conn->query($sql);
    if ($result){
        echo "<script>alert("data berhasil diedit")</script>";
        header ("Location: CRUD.php");
        
    

    }else{
        echo "<script>alert("data gagal ter-edit")</script>";
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