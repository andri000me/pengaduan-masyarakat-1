<?php 
	require '../koneksi.php';
	$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas ORDER BY pengaduan.tgl_pengaduan");
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
	
	<a href="insert_tanggapan.php">Tambah Tanggapan</a>
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal Pengaduan</th>
				<th>Isi Laporan</th>
				<th>Tanggal Tanggapan</th>
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
					<td><?= $dataTanggapan['tgl_pengaduan']; ?></td>
					<td><?= $dataTanggapan['isi_laporan']; ?></td>
					<td><?= $dataTanggapan['tgl_tanggapan']; ?></td>
					<td><?= $dataTanggapan['tanggapan']; ?></td>
					<td><?= $dataTanggapan['nama_petugas']; ?></td>
					<td>
						<a href="update_tanggapan.php?id_tanggapan=<?= $dataTanggapan['id_tanggapan']; ?>">Ubah</a>
						<a onclick="return confirm('Apakah anda yakin menghapus data tanggapan dengan tanggapan <?= $dataTanggapan['tanggapan']; ?>?')" href="delete_tanggapan.php?id_tanggapan=<?= $dataTanggapan['id_tanggapan'] ?>">Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>