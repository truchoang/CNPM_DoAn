<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/stlye.css">
	<title>Shop Hoa TN</title>
</head>

<body>
	<?php
	//config
	include('admin/config.php');
	$sql = "SELECT Link_img FROM sanpham WHERE DATEDIFF(CURRENT_DATE(),NgayNhapKho) = HSD ";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($query)) {
		$link = "admin/modules/quanlychitietsanpham/uploads/" . $row['Link_img'];
		unlink($link);
	}
	$sql = "DELETE FROM `sanpham` WHERE DATEDIFF(CURRENT_DATE(),NgayNhapKho) = HSD";
	$query = mysqli_query($conn, $sql);

	//giao diện
	include('modules/menu.php');
	include('modules/header.php');
	include('modules/content.php');
	include('modules/footer.php');
	?>

</body>

</html>