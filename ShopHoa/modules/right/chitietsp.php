<?php
$sql = "SELECT * FROM sanpham WHERE MaSP = $_GET[id]";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

?>
<div>
	<div class="img_sp">
		<img src="admin/modules/quanlychitietsanpham/uploads/<?php echo $row['Link_img']; ?>" width="400" height="400">
	</div>
	<div class="info_product_detail">
		<h1><?php echo $row['TenSP']; ?></h1>
		<p><b>Giá :</b> <span><?php echo number_format($row['DonGia']); ?>đ</span></p>
		<p><i>Số lượng còn lại :</i> <span><?php echo $row['SoLuong']; ?></span></p>
		<div class="des"><?php echo $row['MoTa']; ?></div>
		<div class="btn_group_buy">
			<a class="btn_buy" href="Index.php?view=cart"> Mua ngay</a>	
			<a class="btn_add_cart" href="Index.php?view=cart&add=<?php echo $row['MaSP'] ?>">
					<img src="images/red-simple-shopping-cart-icon-12.png"" />
					Thêm vào giỏ
			</a>
		</div>
		
		
	</div>