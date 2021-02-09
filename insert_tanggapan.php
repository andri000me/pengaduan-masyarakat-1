<?php 
	require 'koneksi.php';
	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
	$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");

	if (isset($_POST['btnInsertTanggapan'])) {
		$id_pengaduan = $_POST['id_pengaduan'];
		$tgl_tanggapan = $_POST['tgl_tanggapan'];
		$tanggapan = $_POST['tanggapan'];
		$id_petugas = $_POST['id_petugas'];
		$insertTanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES ('', '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
		if ($insertTanggapan) {
			header("Location: show_tanggapan.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Tanggapan</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td><label>Isi Laporan</label></td>
				<td>
					<select name="id_pengaduan">
						<?php foreach ($pengaduan as $dataPengaduan): ?>
							<option value="<?= $dataPengaduan['id_pengaduan']; ?>"><?= $dataPengaduan['isi_laporan']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Tanggapan</label></td>
				<td><input type="date" name="tgl_tanggapan"></td>
			</tr>
			<tr>
				<td><label>Tanggapan</label></td>
				<td><textarea name="tanggapan"></textarea></td>
			</tr>
			<tr>
				<td><label>Nama Petugas</label></td>
				<td>
					<select name="id_petugas">
						<?php foreach ($petugas as $dataPetugas): ?>
							<option value="<?= $dataPetugas['id_petugas']; ?>"><?= $dataPetugas['nama_petugas']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="btnInsertTanggapan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>