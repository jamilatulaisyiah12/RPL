<?php 

$koneksi = mysqli_connect('localhost','root','','evote');

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>