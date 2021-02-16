<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
	}
	$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat ORDER BY nik ASC");
	
	$id_pengaduan = $_GET['id_pengaduan'];
	$getPengaduanById = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN kelurahan ON pengaduan.id_kelurahan = kelurahan.id_kelurahan WHERE pengaduan.id_pengaduan = '$id_pengaduan'");
	$dataPengaduan = mysqli_fetch_assoc($getPengaduanById);
	$id_kelurahan = $dataPengaduan['id_kelurahan'];

	$getIdKecamatanByIdKelurahan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kelurahan WHERE id_kelurahan = '$id_kelurahan'"));
	$id_kecamatan = $getIdKecamatanByIdKelurahan['id_kecamatan'];
	$getDataKecamatanByIdKelurahan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'"));

	if (isset($_POST['btnUpdatePengaduan'])) {
		$nik = $_SESSION['nik'];
		$tgl_pengaduan = $_POST['tgl_pengaduan'];
		$isi_laporan = $_POST['isi_laporan'];
		$id_kelurahan = $_POST['id_kelurahan'];

		if ($_FILES['foto']['name'] != "") {
			$ekstensi_diperbolehkan	= array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
			$foto = $_FILES['foto']['name'];
			$x = explode('.', $foto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	

			if (in_array($ekstensi, $ekstensi_diperbolehkan) == true){
				if($ukuran < 204800){			
					move_uploaded_file($file_tmp, '../img/' . $foto);
				}
			}
		} else {
			$foto = $_POST['foto_lama'];
		}

		$updatePengaduan = mysqli_query($koneksi, "UPDATE pengaduan SET tgl_pengaduan = '$tgl_pengaduan', nik = '$nik', isi_laporan = '$isi_laporan', foto = '$foto', id_kelurahan = '$id_kelurahan' WHERE id_pengaduan = '$id_pengaduan'");
		if ($updatePengaduan) {
			header("Location: show_pengaduan.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Pengaduan - <?= $dataPengaduan['isi_laporan']; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>
<body>
	<?php include 'sidebar.php'; ?>
	
	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="foto_lama" value="<?= $dataPengaduan['foto']; ?>">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td><label>NIK</label></td>
				<td>
					<input type="text" disabled value="<?= $_SESSION['nik']; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Tanggal Pengaduan</label></td>
				<td><input type="date" name="tgl_pengaduan" value="<?= $dataPengaduan['tgl_pengaduan']; ?>"></td>
			</tr>
			<tr>
				<td><label>Isi Laporan</label></td>
				<td><textarea name="isi_laporan"><?= $dataPengaduan['isi_laporan']; ?></textarea></td>
			</tr>
			<tr>
				<td><label>Kecamatan</label></td>
				<td>
					<select id="form_kecamatan">
						<option value="<?= $getDataKecamatanByIdKelurahan['id_kecamatan']; ?>"><?= $getDataKecamatanByIdKelurahan['kecamatan']; ?></option>
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
					<select id="form_kelurahan" name="id_kelurahan">
						<?php 
							$dataKelurahanLama = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kelurahan WHERE id_kelurahan = '$id_kelurahan' ORDER BY kelurahan ASC"));
						?>
						<option value="<?= $dataKelurahanLama['id_kelurahan']; ?>"><?= $dataKelurahanLama['kelurahan']; ?></option>
						<?php 
							$kelurahan = mysqli_query($koneksi,"SELECT * FROM kelurahan WHERE id_kecamatan = '$id_kecamatan' ORDER BY kelurahan ASC");
						?>
						<?php foreach ($kelurahan as $dataKelurahan): ?>
							<option value="<?= $dataKelurahan['id_kelurahan']; ?>"><?= $dataKelurahan['kelurahan']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Foto</label></td>
				<td>
					<img style="width: 75px" src="../img/<?= $dataPengaduan['foto']; ?>" alt="foto"><br>
					<input type="file" name="foto">
				</td>
			</tr>
			<tr>
				<td><label>status</label></td>
				<td>
					<input type="text" disabled value="<?= $dataPengaduan['status']; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnUpdatePengaduan">Kirim</button></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){

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