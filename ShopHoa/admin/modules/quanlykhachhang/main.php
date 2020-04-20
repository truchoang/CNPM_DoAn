<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}

	if ($temp == 'insert'){
		include('modules/quanlykhachhang/insert.php');
	}	
	if ($temp == 'up'){
		include('modules/quanlykhachhang/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlykhachhang/update.php');
	}
	?>
</div>

<div class ="right">
	<?php
		include('modules/quanlykhachhang/list.php');
	?>
</div>