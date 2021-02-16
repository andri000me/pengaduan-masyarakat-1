<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
	}
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat ORDER BY nik ASC");

	if (isset($_POST['btnInsertPengaduan'])) {
		$nik = $_SESSION['nik'];
		$tgl_pengaduan = $_POST['tgl_pengaduan'];
		$isi_laporan = $_POST['isi_laporan'];
		$status = 'proses';
		$id_kelurahan = $_POST['id_kelurahan'];

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
		
		$insertPengaduan = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('', '$tgl_pengaduan', '$nik', '$isi_laporan', '$foto', '$status', '$id_kelurahan')");
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
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
				<td><label>Kecamatan</label></td>
				<td>
					<select id="form_kecamatan">
						<option value="0">Pilih Kecamatan</option>
						<?php 
						$kecamatan = mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY kecamatan ASC");
						?>
						<?php foreach ($kecamatan as $dataKecamatan): ?>
							<option value="<?= $dataKecamatan['id_kecamatan']; ?>"><?= $dataKecamatan['kecamatan']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Kelurahan</label></td>
				<td>
					<select id="form_kelurahan" name="id_kelurahan"></select>
				</td>
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

	<script type="text/javascript">
		$(document).ready(function(){

			$("#form_kelurahan").hide();

			$('body').on("change", "#form_kecamatan", function() {
				var id = $(this).val();
				var data = "id="+id+"&data=kelurahan";
				$.ajax({
					type: 'POST',
					url: "get_kelurahan.php",
					data: data,
					success: function(hasil) {
						$("#form_kelurahan").html(hasil);
						$("#form_kelurahan").show();
					}
				});
			});
		});
	</script>
</body>
</html>