<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}

	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik INNER JOIN kelurahan ON pengaduan.id_kelurahan = kelurahan.id_kelurahan");
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
	<?php if ($_SESSION['level'] == 'admin'): ?>
		<a href="insert_pengaduan.php">Tambah Pengaduan</a>
	<?php endif ?>
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Pengaduan</th>
				<th>NIK</th>
				<th>Isi Laporan</th>
				<th>Foto</th>
				<th>Status</th>
				<th>kelurahan</th>
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
					<td><?= $dataPengaduan['kelurahan']; ?></td>
					<td>
						<?php if ($dataPengaduan['status'] == 'proses'): ?>
							<a href="insert_tanggapan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Tanggapi</a>
						<?php endif ?>
						
						<?php if ($_SESSION['level'] == 'admin'): ?>
							<a href="update_pengaduan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Ubah</a>
							<a onclick="return confirm('Apakah anda yakin menghapus data pengaduan dengan isi laporan <?= $dataPengaduan['isi_laporan']; ?>?')" href="delete_pengaduan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Hapus</a>
						<?php endif ?>

					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>