<?php 
	require 'koneksi.php';
	$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
?>
<html>
	<head>
		<title>Daftar Petugas</title>
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Petugas</th>
					<th>Username</th>
					<th>No. Telepon</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($petugas as $dataPetugas): ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $dataPetugas['nama_petugas']; ?></td>
						<td><?= $dataPetugas['username']; ?></td>
						<td><?= $dataPetugas['telp']; ?></td>
						<td><?= $dataPetugas['level']; ?></td>
						<td>
							<a onclick="return confirm('Apakah anda yakin ingin menghapus data petugas dengan username <?= $dataPetugas['username']; ?>?')" href="delete_petugas.php?id_petugas=<?= $dataPetugas['id_petugas']; ?>">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</body>
</html>