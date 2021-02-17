<?php 
	require '../koneksi.php';

	if (isset($_SESSION['id_petugas'])) {
		header("Location: dashboard.php");
		exit();
	}

	if (isset($_POST['btnLogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$getPetugasByUsername = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username'");

		if ($dataPetugas = mysqli_fetch_assoc($getPetugasByUsername)) {
			if (password_verify($password, $dataPetugas['password'])) {
				$_SESSION['id_petugas'] = $dataPetugas['id_petugas'];
				$_SESSION['nama_petugas'] = $dataPetugas['nama_petugas'];
				$_SESSION['username'] = $dataPetugas['username'];
				$_SESSION['telp'] = $dataPetugas['telp'];
				$_SESSION['level'] = $dataPetugas['level'];
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
	<title>Masuk - Petugas</title>
</head>
<body>
	<h1 style="text-align: center;">Pengaduan Masyarakat</h1>
	<h2 style="text-align: center;">Selamat Datang</h2>
	<form method="post">
		<table style="margin: auto; border: 1px black solid; border-radius: 5px; padding: 5px" cellpadding="10" cellspacing="0">
			<tr>
				<td><b>Masuk Petugas</b></td>
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
				<a href="../masyarakat/login_masyarakat.php">Masuk Masyarakat</a>
			</td>
		</tr>
	</table>
</body>
</html>