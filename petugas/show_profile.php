<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}
	
	$id_petugas = $_SESSION['id_petugas'];
	$getPetugasById = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
	$dataPetugas = mysqli_fetch_assoc($getPetugasById);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil - <?= $dataPetugas['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<h3>Profil - <?= $dataPetugas['username']; ?></h3>
	<table border="0" cellpadding="4" cellspacing="0">
		<tr>
			<td><b>Username</b></td>
			<td>:</td>
			<td><?= $dataPetugas['username']; ?></td>
		</tr>
		<tr>
			<td><b>Nama Petugas</b></td>
			<td>:</td>
			<td><?= $dataPetugas['nama_petugas']; ?></td>
		</tr>
		<tr>
			<td><b>Telp</b></td>
			<td>:</td>
			<td><?= $dataPetugas['telp']; ?></td>
		</tr>
		<tr>
			<td><b>Level</b></td>
			<td>:</td>
			<td><?= $dataPetugas['level']; ?></td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="update_profile.php">Ubah Profil</a>
			</td>
		</tr>
	</table>
</body>
</html>