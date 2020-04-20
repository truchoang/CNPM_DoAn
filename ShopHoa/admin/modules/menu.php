<div id = "menu">
				<ul>
				<?php
					session_start();
					
					if (isset($_SESSION['login'])) {
						$temp = $_SESSION['login'];
						$sql = "SELECT * FROM thanhvien WHERE ID = $temp ";
						$run = mysqli_query($conn,$sql);
					$row= mysqli_fetch_array($run);		
						
						if ($row['QuyenHan'] == 'NV'){?>					
					<li><a href ="../Index.php">Trang chủ</a></li>
					<li><a href ="index.php?quanly=quanlychitietsanpham&action=insert">Sản phẩm</a></li>
						<li><a href ="index.php?quanly=quanlydonhang">Đơn hàng</a></li>
				<?php }  if ($row['QuyenHan'] == 'AM'){ ?>	
					<li><a href ="../Index.php">Trang chủ</a></li>
					<li><a href ="index.php?quanly=quanlyloaisanpham&action=insert"> Loại SP</a></li>
					<li><a href ="index.php?quanly=quanlyhinhthuc&action=insert"> Hình thức SP</a></li>
					<li><a href ="index.php?quanly=quanlyvanchuyen&action=insert">Vận chuyển</a></li>
					<li><a href ="index.php?quanly=quanlychitietsanpham&action=insert"> Chi Tiết SP</a></li>
					<li><a href ="index.php?quanly=quanlynhanvien&action=insert">Nhân viên</a></li>
					<li><a href ="index.php?quanly=quanlykhachhang&action=insert">Khách hàng</a></li>
					<li><a href ="index.php?quanly=quanlydonhang">Đơn hàng</a></li>
					<?php } } else { header('location: ../member/login.php');}?>
				
				</ul>
				 
			</div>