<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
		exit();
	}
	$nik = $_SESSION['nik'];
	$getMasyarakatByNIK = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$nik'");
	$dataMasyarakat = mysqli_fetch_assoc($getMasyarakatByNIK);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil - <?= $dataMasyarakat['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<h3>Profil - <?= $dataMasyarakat['username']; ?></h3>
	<table border="0" cellpadding="4" cellspacing="0">
		<tr>
			<td><b>Username</b></td>
			<td>:</td>
			<td><?= $dataMasyarakat['username']; ?></td>
		</tr>
		<tr>
			<td><b>NIK</b></td>
			<td>:</td>
			<td><?= $dataMasyarakat['nik']; ?></td>
		</tr>
		<tr>
			<td><b>Nama</b></td>
			<td>:</td>
			<td><?= $dataMasyarakat['nama']; ?></td>
		</tr>
		<tr>
			<td><b>Telp</b></td>
			<td>:</td>
			<td><?= $dataMasyarakat['telp']; ?></td>
		</tr>
		<tr>
			<td><b>Alamat</b></td>
			<td>:</td>
			<td><?= $dataMasyarakat['alamat']; ?></td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="update_profile.php">Ubah Profil</a>
			</td>
		</tr>
	</table>
</body>
</html>