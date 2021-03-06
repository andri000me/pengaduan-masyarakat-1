<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
		exit();
	}
	
	$nik = $_SESSION['nik'];
	$getMasyarakatByNIK = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$nik'");
	$dataMasyarakat = mysqli_fetch_assoc($getMasyarakatByNIK);

	if (isset($_POST['btnUpdateMasyarakat'])) {
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		$updateMasyarakat = mysqli_query($koneksi, "UPDATE masyarakat SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE nik = '$nik'");

		if ($updateMasyarakat) {
			header("Location: show_profile.php");
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Profil - <?= $dataMasyarakat['username']; ?></title>
</head>
<body>
	<h3>Ubah Profil - <?= $dataMasyarakat['username']; ?></h3>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td><input type="text" disabled value="<?= $dataMasyarakat['nik']; ?>"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input type="text" disabled value="<?= $dataMasyarakat['username']; ?>"></td>
			</tr>
			<tr>
				<td><label>Nama</label></td>
				<td><input type="text" name="nama" value="<?= $dataMasyarakat['nama']; ?>"></td>
			</tr>
			<tr>
				<td><label>Telp</label></td>
				<td><input type="number" name="telp" value="<?= $dataMasyarakat['telp']; ?>"></td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
				<td><textarea name="alamat"><?= $dataMasyarakat['alamat']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdateMasyarakat">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>