<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	if ($temp == 'insert'){
		include('modules/quanlyloaisanpham/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlyloaisanpham/update.php');
	}
	?>
</div>
<div class ="right">
	<?php
		include('modules/quanlyloaisanpham/list.php');
	?>
</div>