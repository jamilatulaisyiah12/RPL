<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:../index.php");
    exit;
}
include '../koneksi.php';

$idpaslon = $_GET['idpaslon'];
$iddpt = $_GET['iddpt'];

mysqli_query($koneksi, "INSERT INTO tabel_rekap VALUES('$iddpt', '$idpaslon')");
mysqli_query($koneksi, "UPDATE tabel_dpt SET waktu='Sudah' WHERE username='$iddpt'");

header('location:index.php');


?>

