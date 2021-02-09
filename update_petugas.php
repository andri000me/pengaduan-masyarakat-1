<?php 
	require 'koneksi.php';
	
	$id_petugas = $_GET['id_petugas'];
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
						<?php if ($dataPetugas['level'] == 'admin'): ?>
							<option value="admin">admin</option>
							<option value="petugas">petugas</option>
						<?php else: ?>
							<option value="petugas">petugas</option>
							<option value="admin">admin</option>
						<?php endif ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="btnUpdatePetugas">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>