<?php 
	require '../koneksi.php';
	if (!isset($_SESSION['nik'])) {
		header("Location: login_masyarakat.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dasbor - <?= $_SESSION['username']; ?></title>
</head>
<body>
	<?php include 'sidebar.php'; ?>
</body>
</html>