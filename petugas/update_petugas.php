<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	// jika level petugas selain admin, tidak dapat menghapus
	if ($_SESSION['level'] != 'admin') {
		echo "data petugas tidak dapat diubah, karena bukan admin";
		header("Location: show_petugas.php");
		exit();
	}

	$id_petugas = $_GET['id_petugas'];

	// jika admin yang melakukan, gugurkan perintah
	$dataPetugas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'"));
	if ($dataPetugas['level'] == 'admin') {
		echo "data petugas tidak dapat dihapus, karena data admin";
		header("Location: show_petugas.php");
		exit();
	}

	$getPetugasById = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
	$dataPetugas = mysqli_fetch_assoc($getPetugasById);

	if (isset($_POST['btnUpdatePetugas'])) {
		$nama_petugas = $_POST['nama_petugas'];
		$telp = $_POST['telp'];
		$level = $_POST['level'];

		$updatePetugas = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas = '$nama_petugas', telp = '$telp', level = '$level' WHERE id_petugas = '$id_petugas'");
		if ($updatePetugas) {
			header("Location: show_petugas.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Petugas - <?= $dataPetugas['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
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
				<td>
					<select name="level">
						<option value="petugas">petugas</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdatePetugas">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>