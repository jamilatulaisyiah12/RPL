<?php

include '../koneksi.php';

$username= $_GET['username'];


mysqli_query($koneksi,"DELETE FROM tabel_dpt WHERE username='$username'");
mysqli_query($koneksi,"DELETE FROM data_siswa WHERE NIS='$username'");
echo "DELETE FROM data_siswa WHERE NIS='$username'";
header("location:index.php?page=data-siswa");

?>