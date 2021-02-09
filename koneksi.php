<?php 
	$hostname	= 'localhost';
	$username 	= 'root';
	$password 	= '';
	$database	= 'pengaduan_masyarakat';
	$koneksi 	= mysqli_connect($hostname, $username, $password, $database);
	if ($koneksi) {
		// echo "berhasil";
	}
 ?>