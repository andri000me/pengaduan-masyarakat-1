<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	if (isset($_POST['btnInsertPetugas'])) {
		$nama_petugas = $_POST['nama_petugas'];
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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
	<?php include 'sidebar.php'; ?>
	
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
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
						<option value="petugas">petugas</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnInsertPetugas">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>