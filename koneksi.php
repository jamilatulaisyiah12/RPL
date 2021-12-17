<?php 

$koneksi = mysqli_connect('localhost','root','','evotesmksp');

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>