<?php 
	require 'koneksi.php';
	
	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
	$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
	
	$id_tanggapan = $_GET['id_tanggapan'];
	$getTanggapanById = mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_tanggapan = '$id_tanggapan'");
	$dataTanggapan = mysqli_fetch_assoc($getTanggapanById);

	if (isset($_POST['btnUpdateTanggapan'])) {
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
	<title>Ubah Tanggapan - <?= $dataTanggapan['tanggapan']; ?></title>
</head>
<body>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>Isi Laporan</label></td>
				<td>
					<select name="id_pengaduan">
						<option value="<?= $dataTanggapan['id_pengaduan']; ?>"><?= $dataTanggapan['isi_laporan']; ?></option>
						<?php foreach ($pengaduan as $dataPengaduan): ?>
							<?php if ($dataTanggapan['id_pengaduan'] != $dataPengaduan['id_pengaduan']): ?>
								<option value="<?= $dataPengaduan['id_pengaduan']; ?>"><?= $dataPengaduan['isi_laporan']; ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Tanggapan</label></td>
				<td><input type="date" name="tgl_tanggapan" value="<?= $dataTanggapan['tgl_tanggapan']; ?>"></td>
			</tr>
			<tr>
				<td><label>Tanggapan</label></td>
				<td><textarea name="tanggapan"><?= $dataTanggapan['tanggapan']; ?></textarea></td>
			</tr>
			<tr>
				<td><label>Nama Petugas</label></td>
				<td>
					<select name="id_petugas">
						<option value="<?= $dataTanggapan['id_petugas']; ?>"><?= $dataTanggapan['username']; ?></option>
						<?php foreach ($petugas as $dataPetugas): ?>
							<?php if ($dataTanggapan['id_petugas'] != $dataPetugas['id_petugas']): ?>
								<option value="<?= $dataPetugas['id_petugas']; ?>"><?= $dataPetugas['nama_petugas']; ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="btnUpdateTanggapan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>