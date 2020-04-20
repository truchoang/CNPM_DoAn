<?php
$sql1 = "SELECT * FROM nhomsanpham";
$query = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM loaisanpham";
$query1 = mysqli_query($conn, $sql2);
?>
<div id="menu">
	<ul>
		<!-- Thanh menu -->
		<li><a href="Index.php">
				<form action="Index.php" method="post"> Trang chủ </form>
			</a></li>
		<li><a href="Index.php?view=chitietloaisanpham&id=1"> Sản phẩm </a>
			<ul class="sub-menu">
				<li style="color:  plum"> Loại hoa</li>
				<?php while ($row = mysqli_fetch_array($query)) { ?>
				<li><a href="index.php?view=chitietloaisp&id=<?php echo $row['MaNhom']; ?>"><?php echo $row['TenNhom'];
				} ?></a></li>
				<li style="color:  plum">Hình thức</li>
				<?php while ($row = mysqli_fetch_array($query1)) { ?>
				<li><a href="index.php?view=chitiethinhthuc&id=<?php echo $row['MaLoai']; ?>"><?php echo $row['TenLoai'];
				} ?></a></li>
			</ul>
		</li>
		<li><a href="#">Hướng dẫn</a></li>
		<li><a href="#">Liên hệ</a></li>

		<!--Kiểm tra đăng nhập -->
		<?php
		if (session_status() == PHP_SESSION_NONE) session_start();
		if (isset($_SESSION['login'])) {
			$temp = $_SESSION['login'];
			$sql = "SELECT * FROM thanhvien WHERE ID = $temp ";
			$run = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($run);
			if ($row['QuyenHan'] == 'NV' || $row['QuyenHan'] == 'AM') {
		?>
		<li><a href="admin/index.php">Quản Trị</a></li> <?php }
														} ?>
		<li class="icon_giohang"><a href="Index.php?view=cart"><img src="images/red-simple-shopping-cart-icon-12.png"
					width="50"></a> </li>
	</ul>

</div>