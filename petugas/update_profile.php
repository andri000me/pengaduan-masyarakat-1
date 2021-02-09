<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$id_petugas = $_SESSION['id_petugas'];
	$getPetugasById = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
	$dataPetugas = mysqli_fetch_assoc($getPetugasById);

	if (isset($_POST['btnUpdateMasyarakat'])) {
		$nama_petugas = $_POST['nama_petugas'];
		$telp = $_POST['telp'];
		
		$updateMasyarakat = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas = '$nama_petugas', telp = '$telp' WHERE id_petugas = '$id_petugas'");

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
	<title>Ubah Profil - <?= $dataPetugas['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<h3>Ubah Profil - <?= $dataPetugas['username']; ?></h3>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>Username</label></td>
				<td><input type="text" disabled value="<?= $dataPetugas['username']; ?>"></td>
			</tr>
			<tr>
				<td><label>Nama Petugas</label></td>
				<td><input type="text" name="nama_petugas" value="<?= $dataPetugas['nama_petugas']; ?>"></td>
			</tr>
			<tr>
				<td><label>Telp</label></td>
				<td><input type="number" name="telp" value="<?= $dataPetugas['telp']; ?>"></td>
			</tr>
			<tr>
				<td><label>Level</label></td>
				<td><input type="text" disabled value="<?= $dataPetugas['level']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdateMasyarakat">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>