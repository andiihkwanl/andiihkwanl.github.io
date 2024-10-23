<?php
include "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM katalog WHERE id=$id")->fetch_assoc();


if (!empty($data['file']) && file_exists("uploads/" . $data['file'])) {
    unlink("uploads/" . $data['file']);
}

$sql = "DELETE FROM katalog WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    header("Location: CRUD.php");
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
}
?>
