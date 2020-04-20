<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	if ($temp == 'insert'){
		include('modules/quanlyvanchuyen/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlyvanchuyen/update.php');
	}
	?>
</div>

<div class ="right">
	<?php
		include('modules/quanlyvanchuyen/list.php');
	?>
</div>