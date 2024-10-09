<?php 
include "koneksi.php";


$id = $_GET['id'];
if($_SERVER["REQUEST_METHHOD"]=="post"){
    $sql = "delete from katalog where id = '$id'";
    $result = $conn->query($sql);
    if ($result){
        echo "<script>alert("data berhasil dihapus")</script>";
        header ("Location: CRUD.php");
        
    

    }else{
        echo "<script>alert("data gagal dihapus")</script>";
    }

}
?>