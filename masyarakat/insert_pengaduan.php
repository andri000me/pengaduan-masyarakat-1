<?php 
	require '../koneksi.php';
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat ORDER BY nik ASC");

	if (isset($_POST['btnInsertPengaduan'])) {
		$nik = $_SESSION['nik'];
		$tgl_pengaduan = $_POST['tgl_pengaduan'];
		$isi_laporan = $_POST['isi_laporan'];
		$status = 'proses';
		
		if ($_FILES['foto']['name']) {
			$ekstensi_diperbolehkan	= array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
			$foto = $_FILES['foto']['name'];
			$x = explode('.', $foto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	

			if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
				if($ukuran < 204800) {			
					move_uploaded_file($file_tmp, '../img/' . $foto);
				}
			}
		} else {
			$foto = 'default.png';
		}
		
		$insertPengaduan = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('', '$tgl_pengaduan', '$nik', '$isi_laporan', '$foto', '$status')");
		if ($insertPengaduan) {
			header("Location: show_pengaduan.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Pengaduan</title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<form method="post" enctype="multipart/form-data">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td>
					<input type="text" disabled value="<?= $_SESSION['nik']; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Pengaduan</label></td>
				<td><input type="date" name="tgl_pengaduan" value="<?= date('Y-m-d'); ?>"></td>
			</tr>
			<tr>
				<td><label>Isi Laporan</label></td>
				<td><textarea required name="isi_laporan"></textarea></td>
			</tr>
			<tr>
				<td><label>Foto</label></td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnInsertPengaduan">Kirim</button></td>
			</tr>
		</table>
	</form>
</body>
</html>