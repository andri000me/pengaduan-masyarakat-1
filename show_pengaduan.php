<?php 
	require 'koneksi.php';
	$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
?>

<html>
	<head>
		<title>Daftar Pengaduan</title>
	</head>
	<body>
		<table>
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
						<td><img src="img/<?= $dataPengaduan['foto']; ?>"></td>
						<td><?= $dataPengaduan['status']; ?></td>
						<td>
							<a onclick="return confirm('Apakah anda yakin menghapus data pengaduan dengan isi laporan <?= $dataPengaduan['isi_laporan']; ?>?')" href="delete_pengaduan.php?id_pengaduan=<?= $dataPengaduan['id_pengaduan']; ?>">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</body>
</html>