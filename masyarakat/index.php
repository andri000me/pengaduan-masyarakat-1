<?php 
	if (isset($_SESSION['nik'])) {
		header("Location: dashboard.php");
	} else {
		header("Location: login_masyarakat.php");
	}
?>