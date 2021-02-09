<?php 
	require 'koneksi.php';
	if (isset($_POST['btnInsertMasyarakat'])) {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		$insertMasyarakat = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik', '$nama', '$username', '$password', '$telp', '$alamat')");

		if ($insertMasyarakat) {
			header("Location: show_masyarakat.php");
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Masyarakat</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td><label>NIK</label></td>
				<td><input type="text" name="nik"></td>
			</tr>
			<tr>
				<td><label>Nama</label></td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><label>Telp</label></td>
				<td><input type="number" name="telp"></td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
				<td><textarea name="alamat"></textarea></td>
			</tr>
			<tr>
				<td><button type="submit" name="btnInsertMasyarakat">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>