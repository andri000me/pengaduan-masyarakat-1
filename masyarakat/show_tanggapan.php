<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
	}
	$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Tanggapan</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Isi Laporan</th>
				<th>Tanggal Pengaduan</th>
				<th>Tanggapan</th>
				<th>Nama Petugas</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($tanggapan as $dataTanggapan): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $dataTanggapan['isi_laporan']; ?></td>
					<td><?= $dataTanggapan['tgl_pengaduan']; ?></td>
					<td><?= $dataTanggapan['tanggapan']; ?></td>
					<td><?= $dataTanggapan['nama_petugas']; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>