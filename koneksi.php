<?php 

$koneksi = mysqli_connect('localhost','root','','e-votesmksp');

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>