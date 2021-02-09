<?php 
	if (isset($_SESSION['id_petugas'])) {
		header("Location: dashboard.php");
	} else {
		header("Location: login_petugas.php");
	}
?>