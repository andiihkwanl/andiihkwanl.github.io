<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "andi";
$conn = new mysqli ($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die ("koneksi gagal")
}
?>
