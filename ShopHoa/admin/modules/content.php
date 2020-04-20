<div class = "content">
			<?php
				if (isset($_GET['quanly'])){
					$temp = $_GET['quanly'];
				}
				else {
					$temp ='';
				}
				if ($temp == 'quanlyloaisanpham'){
					include('modules/quanlyloaisanpham/main.php');
				}
				if ($temp == 'quanlyhinhthuc'){
					include('modules/quanlyhinhthuc/main.php');
				}
				if ($temp == 'quanlychitietsanpham'){
					include('modules/quanlychitietsanpham/main.php');
				}
				if ($temp == 'quanlyvanchuyen'){
					include('modules/quanlyvanchuyen/main.php');
				}
				if ($temp == 'quanlynhanvien'){
					include('quanlynhanvien/main.php');
				}
				if ($temp == 'quanlykhachhang'){
				
					include('modules/quanlykhachhang/main.php');
				}
			if ($temp == 'quanlydonhang'){
			
					include('modules/quanlydonhang/main.php');
				}
			?>
</div>
<div class ="clear"></div>