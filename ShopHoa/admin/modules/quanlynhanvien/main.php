<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	if ($temp == 'insert'){
		include('modules/quanlynhanvien/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlynhanvien/update.php');
	}
	?>
</div>
<div class ="right">
	<?php
		include('modules/quanlynhanvien/list.php');
	?>
</div>