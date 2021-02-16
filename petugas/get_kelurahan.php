<?php 
require '../koneksi.php';
 
$data = $_POST['data'];
$id = $_POST['id'];
?>
<?php if($data == "kelurahan") : ?>
	<select id="form_kelurahan" name="id_kelurahan">
		<?php 
			$kelurahan = mysqli_query($koneksi,"SELECT * FROM kelurahan WHERE id_kecamatan = '$id' ORDER BY kelurahan ASC");
		?>
		<?php foreach ($kelurahan as $dataKelurahan): ?>
			<option value="<?= $dataKelurahan['id_kelurahan']; ?>"><?= $dataKelurahan['kelurahan']; ?></option>
		<?php endforeach ?>
	</select>
 
<?php endif ?>