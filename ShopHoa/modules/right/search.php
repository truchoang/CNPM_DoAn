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
if ($_POST['searchb'] != '')$_SESSION['search'] =$_POST['searchb'];
if(isset($_POST['search'])){ 
	if ($_POST['searchb'] != '') {
		if (isset($_SESSION['search'])) $temp = $_SESSION['search']; 
		$_SESSION['temp'] = 0;
	}
	else  {
		$temp = '';
	 	$_SESSION['temp'] = 1;
	}
	$search = $_POST['searchb'];
	$sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$temp%'";
	$query = mysqli_query($conn,$sql);
}
?>
<p align="center" style = "color: coral; font-size:30px; margin: 15px; padding-top: 15px;">Kết quả tìm kiếm với <?php echo $temp?></p>
<div class= "alllist">
		<?php if ($query) if (mysqli_num_rows($query) == 0){ ?>
			<p> Không tìm thấy sản phẩm nào</p>
		<?php }else {?>
		<ul>
			<?php
				while ($row = mysqli_fetch_array($query)){ ?>
			<li><a href ="../left/Index.php?view=chitietsp&id=<?php echo $row['MaSP'];?>"><img src ="admin/modules/quanlychitietsanpham/uploads/<?php echo $row['Link_img'];?>" width ="200" height="200">
			<p style="color:  crimson"> <?php echo $row['TenSP'];?></p>
			<p style="color:  blueviolet">Giá <?php echo number_format($row['DonGia']).' đ';?></p>
			<p style="color: blueviolet"> Chi tiết</p><?php }}?>
				</a></li>
		</ul>		 
	</div>
	