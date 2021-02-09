<?php 
	require '../koneksi.php';
	
	if (isset($_SESSION['nik'])) {
		header("Location: dashboard.php");
	}

	if (isset($_POST['btnInsertMasyarakat'])) {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		$insertMasyarakat = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik', '$nama', '$username', '$password', '$telp', '$alamat')");

		if ($insertMasyarakat) {
			header("Location: login_masyarakat.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi</title>
</head>
<body>
	<h3 style="text-align: center;">Registrasi</h3>
	<form method="post">
		<table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td><input type="number" name="nik"></td>
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
				<td colspan="2"><button type="submit" name="btnInsertMasyarakat">Kirim</button></td>
			</tr>
		</table>
	</form>
	<table style="margin: auto;" cellpadding="10" cellspacing="0">
		<tr>
			<td>
				<a href="login_masyarakat.php">Sudah punya akun? Masuk</a>
			</td>
		</tr>
	</table>
</body>
</html>