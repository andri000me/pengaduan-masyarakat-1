<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
	}
	$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Petugas</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<a href="insert_petugas.php">Tambah Petugas</a>
	<table border="1" cellpadding="10" cellspacing="0">
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
						<?php if ($dataPetugas['level'] != 'admin'): ?>
							<a href="update_petugas.php?id_petugas=<?= $dataPetugas['id_petugas']; ?>">Ubah</a>
							<a onclick="return confirm('Apakah anda yakin ingin menghapus data petugas dengan username <?= $dataPetugas['username']; ?>?')" href="delete_petugas.php?id_petugas=<?= $dataPetugas['id_petugas']; ?>">Hapus</a>
						<?php else: ?>
							<span>Admin</span>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>