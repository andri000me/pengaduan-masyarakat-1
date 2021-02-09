<?php 
	require 'koneksi.php';
	$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas");
?>

<html>
	<head>
		<title>Daftar Tanggapan</title>
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Isi Laporan</th>
					<th>Tanggal Pengaduan</th>
					<th>Tanggapan</th>
					<th>Nama Petugas</th>
					<th>Aksi</th>
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
						<td>
							<a onclick="return confirm('Apakah anda yakin menghapus data tanggapan dengan tanggapan <?= $dataTanggapan['tanggapan']; ?>?')" href="delete_tanggapan.php?id_tanggapan=<?= $dataTanggapan['id_tanggapan'] ?>">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</body>
</html>