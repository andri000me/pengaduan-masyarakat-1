<?php 
	require 'koneksi.php';
	if (isset($_POST['btnInsertPetugas'])) {
		$nama_petugas = $_POST['nama_petugas'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$telp = $_POST['telp'];
		$level = $_POST['level'];

		$insertPetugas = mysqli_query($koneksi, "INSERT INTO petugas VALUES ('', '$nama_petugas', '$username', '$password', '$telp', '$level')");
		if ($insertPetugas) {
			header("Location: show_petugas.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Petugas</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td><label>Nama Petugas</label></td>
				<td><input type="text" name="nama_petugas"></td>
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
				<td><label>Level</label></td>
				<td>
					<select name="level">
						<option value="admin">admin</option>
						<option value="petugas">petugas</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="btnInsertPetugas">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>