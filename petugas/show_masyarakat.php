<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['id_petugas'])) {
		header("Location: login_petugas.php");
		exit();
	}
	
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Masyarakat</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	<?php if ($_SESSION['level'] == 'admin'): ?>
		<a href="insert_masyarakat.php">Tambah Masyarakat</a>
	<?php endif ?>	
	
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Username</th>
				<th>No. Telepon</th>
				<th>Alamat</th>
				<?php if ($_SESSION['level'] == 'admin'): ?>
					<th>Aksi</th>
				<?php endif ?>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($masyarakat as $dataMasyarakat): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $dataMasyarakat['nik']; ?></td>
					<td><?= $dataMasyarakat['nama']; ?></td>
					<td><?= $dataMasyarakat['username']; ?></td>
					<td><?= $dataMasyarakat['telp']; ?></td>
					<td><?= $dataMasyarakat['alamat']; ?></td>
					<?php if ($_SESSION['level'] == 'admin'): ?>
						<td>
							<a href="update_masyarakat.php?nik=<?= $dataMasyarakat['nik']; ?>">Ubah</a>
							<a onclick="return confirm('Apakah anda yakin menghapus data masyarakat dengan NIK <?= $dataMasyarakat['nik']; ?>?')" href="delete_masyarakat.php?nik=<?= $dataMasyarakat['nik']; ?>">Hapus</a>
						</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</body>
</html>