<?php
if(session_status()==PHP_SESSION_NONE) session_start();
if(isset($_POST['select'])){
			if ($_POST['select'] == 'up'){ 
				$_SESSION['up'] = 1;
				$_SESSION['down'] =0;
			}
			if ($_POST['select'] == 'down'){
				$_SESSION['up'] = 0;
				$_SESSION['down'] =1;
				}
		}	
	else {
		$_SESSION['up'] = 0;
		$_SESSION['down'] = 0;
	}
if (isset($_SESSION['up']) && $_SESSION['up'] == 1) {
			$sql = "SELECT * FROM sanpham WHERE MaLoai = $_GET[id]  and SoLuong >=  0 ORDER BY DonGia ASC";
			$query = mysqli_query($conn,$sql);
		}
		elseif (isset($_SESSION['down']) && $_SESSION['down'] == 1){
			$sql = "SELECT * FROM sanpham WHERE MaLoai = $_GET[id]  and SoLuong >=  0 ORDER BY DonGia DESC";
			$query = mysqli_query($conn,$sql);
		}
		else{
			$sql = "SELECT * FROM sanpham WHERE MaLoai = $_GET[id]  and SoLuong >=  0";
			$query = mysqli_query($conn,$sql);
		}
?>

<?php
	$sql1 = "SELECT * FROM loaisanpham WHERE MaLoai = '$_GET[id]'";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($query1);
?>
<p align="center" style = "color: coral; font-size:30px; margin: 15px; padding-top: 15px;"> <?php echo $row1['TenLoai']?> </p>
<div class= "alllist">
		<ul>
			<?php
				while ($row = mysqli_fetch_array($query)){ ?>
			<li><a href ="Index.php?view=chitietsp&id=<?php echo $row['MaSP']?>"><img src ="admin/modules/quanlychitietsanpham/uploads/<?php echo $row['Link_img']?>" width ="200" height="200">
			<p style="color:  crimson"> <?php echo $row['TenSP'];?></p>
			<p style="color:  blueviolet">Đơn giá: <?php echo number_format($row['DonGia']);?></p>
			<p style="color: blueviolet"> Chi tiết</p><?php } ?>
				</a></li>
		</ul>		 
	</div>
	