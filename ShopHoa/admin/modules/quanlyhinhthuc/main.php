<div class ="left">
	<?php
	if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	if ($temp == 'insert'){
		include('modules/quanlyhinhthuc/insert.php');
	}
	if ($temp == 'update'){
		include('modules/quanlyhinhthuc/update.php');
	}
	?>
</div>

<div class ="right">
	<?php
		include('modules/quanlyhinhthuc/list.php');
	?>
</div>