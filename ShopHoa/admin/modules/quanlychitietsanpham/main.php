<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	if ($temp == 'insert'){
		include('modules/quanlychitietsanpham/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlychitietsanpham/update.php');
	}
	?>
</div>

<div class ="right">
	<?php
		include('modules/quanlychitietsanpham/list.php');
	?>
</div>