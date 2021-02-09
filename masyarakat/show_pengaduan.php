<?php 
	require '../koneksi.php';
	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Pengaduan</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>

	<a href="insert_pengaduan.php">Tambah Pengaduan</a>
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Pengaduan</th>
				<th>NIK</th>
				<th>Isi Laporan</th>
				<th>Foto</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($pengaduan as $dataPengaduan): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $dataPengaduan['tgl_pengaduan']; ?></td>
					<td><?= $dataPengaduan['nik']; ?></td>
					<td><?= $dataPengaduan['isi_laporan']; ?></td>
					<td><img style="width: 150px" src="../img/<?= $dataPengaduan['foto']; ?>"></td>
					<td><?= $dataPengaduan['status']; ?></td>
					<td>
						<?php if ($dataPengaduan['status'] == 'proses'): ?>
							<a href="update_pengaduan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Ubah</a>
							<a onclick="return confirm('Apakah anda yakin menghapus data pengaduan dengan isi laporan <?= $dataPengaduan['isi_laporan']; ?>?')" href="delete_pengaduan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Hapus</a>
						<?php else: ?>
							<span>selesai</span>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>