<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
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

	<?php if ($_SESSION['level'] == 'admin'): ?>
		<a href="insert_petugas.php">Tambah Petugas</a>
	<?php endif ?>	

	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Petugas</th>
				<th>Username</th>
				<th>No. Telepon</th>
				<th>Level</th>
				<?php if ($_SESSION['level'] == 'admin'): ?>
					<th>Aksi</th>
				<?php endif ?>
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
					<?php if ($_SESSION['level'] == 'admin'): ?>
						<td>
							<?php if ($dataPetugas['level'] != 'admin'): ?>
								<a href="update_petugas.php?id_petugas=<?= $dataPetugas['id_petugas']; ?>">Ubah</a>
								<a onclick="return confirm('Apakah anda yakin ingin menghapus data petugas dengan username <?= $dataPetugas['username']; ?>?')" href="delete_petugas.php?id_petugas=<?= $dataPetugas['id_petugas']; ?>">Hapus</a>
							<?php endif ?>
						</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>