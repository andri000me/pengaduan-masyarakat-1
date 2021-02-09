<?php 
	require 'koneksi.php';
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
?>
<html>
	<head>
		<title>Daftar Masyarakat</title>
	</head>
	<body>
		<a href="insert_masyarakat.php">Tambah Masyarakat</a>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>NIK</th>
					<th>Username</th>
					<th>No. Telepon</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($masyarakat as $dataMasyarakat): ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $dataMasyarakat['nik']; ?></td>
						<td><?= $dataMasyarakat['username']; ?></td>
						<td><?= $dataMasyarakat['telp']; ?></td>
						<td><?= $dataMasyarakat['alamat']; ?></td>
						<td>
							<a onclick="return confirm('Apakah anda yakin menghapus data masyarakat dengan NIK <?= $dataMasyarakat['nik']; ?>?')" href="delete_masyarakat.php?nik=<?= $dataMasyarakat['nik']; ?>">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>

	</body>
</html>