<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	// jika level petugas selain admin, tidak dapat menghapus
	if ($_SESSION['level'] != 'admin') {
		echo "data masyarakat tidak dapat diubah, karena bukan admin";
		header("Location: show_masyarakat.php");
		exit();
	}

	$nik = $_GET['nik'];
	$getMasyarakatById = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$nik'");
	$dataMasyarakat = mysqli_fetch_assoc($getMasyarakatById);
	$nik_lama = $dataMasyarakat['nik'];

	if (isset($_POST['btnUpdateMasyarakat'])) {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		$updateMasyarakat = mysqli_query($koneksi, "UPDATE masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE nik = '$nik_lama'");

		if ($updateMasyarakat) {
			header("Location: show_masyarakat.php");
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Masyarakat - <?= $dataMasyarakat['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td><input type="text" name="nik" value="<?= $dataMasyarakat['nik']; ?>"></td>
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
				<td><button type="submit" name="btnUpdateMasyarakat">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>