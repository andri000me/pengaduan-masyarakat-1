<?php 
	require '../koneksi.php';

	if (isset($_SESSION['nik'])) {
		header("Location: dashboard.php");
	}

	if (isset($_POST['btnLogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$getMasyarakatByUsername = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$username'");

		if ($dataMasyarakat = mysqli_fetch_assoc($getMasyarakatByUsername)) {
			if (password_verify($password, $dataMasyarakat['password'])) {
				$_SESSION['nik'] = $dataMasyarakat['nik'];
				$_SESSION['username'] = $dataMasyarakat['username'];
				$_SESSION['nama'] = $dataMasyarakat['nama'];
				$_SESSION['telp'] = $dataMasyarakat['telp'];
				$_SESSION['alamat'] = $dataMasyarakat['alamat'];
				header("Location: dashboard.php");
			} else {
				echo "gagal";
			}
		} else {
			echo "gagal";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masuk - Pengaduan Masyarakat</title>
</head>
<body>
	<h1 style="text-align: center;">Pengaduan Masyarakat</h1>
	<h2 style="text-align: center;">Selamat Datang</h2>
	<form method="post">
		<table style="margin: auto; border: 1px black solid; border-radius: 5px; padding: 5px" cellpadding="10" cellspacing="0">
			<tr>
				<td><b>Masuk Masyarakat</b></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td style="text-align: right;" colspan="2"><button type="submit" name="btnLogin">Masuk</button></td>
			</tr>
		</table>
	</form>

	<table style="margin: auto;" cellpadding="10" cellspacing="0">
		<tr>
			<td>
				<a href="registrasi.php">Belum punya akun? Daftar</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="../petugas/login_petugas.php">Masuk Petugas</a>
			</td>
		</tr>
	</table>
</body>
</html>