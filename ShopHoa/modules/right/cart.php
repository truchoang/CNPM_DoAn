<center>
	<h1 style="color : crimson; font-size: 50px; margin: 20px; padding: 50px;"> Giỏ hàng của bạn </h1>
</center>

<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_GET['add']) && !empty($_GET['add'])) {
	$id = $_GET['add'];
	@$_SESSION['cart' . $id] += 1;
	header('location: Index.php?view=cart');
}
if (isset($_GET['val'])) {
	$_SESSION['cart' . $_GET['val']] = $_POST['val'];
	header('location:Index.php?view=cart');
}
if (isset($_GET['ins'])) {
	$_SESSION['cart' . $_GET['ins']] += 1;
	header('location: Index.php?view=cart');
}

if (isset($_GET['sub'])) {
	$_SESSION['cart' . $_GET['sub']] -= 1;
	header('location: Index.php?view=cart');
}
if (isset($_GET['del'])) {
	$_SESSION['cart' . $_GET['del']] = 0;
	header('location: Index.php?view=cart');
}

$total = 0;
$sum = 0;
foreach ($_SESSION as $name => $value) {
	if ($value > 0) {
		if (substr($name, 0, 4) == 'cart') {
			$id = substr($name, 4, strlen($name) - 4);
			$sql = "SELECT * FROM sanpham WHERE MaSP ='" . $id . "'";
			$query = mysqli_query($conn, $sql);
?>
			<!--------------------------------------------------------------------------------------->
			<table width="100%" class="tbl_cart">
				<thead>
					
						<td ><strong>Tên Sản phẩm</strong></td>
						<td ><strong>Số lượng</strong></td>
						<td ><strong>Đơn giá</strong></td>
						<td ><strong>Tổng cộng</strong></td>
						<td ></td>
					
				</thead>
				<tbody>
					<tr style=" text-align: center;">
						<?php
						if ($query) while ($row = mysqli_fetch_array($query)) {
							
							if ($value > $row['SoLuong']) $value = $row['SoLuong'];
							$sum = $row['DonGia'] * $value;
							$total += $sum;
						?>
							<td >
								<input name="TenSP" value="<?php echo $row['TenSP'] ?>" type="text" readonly >
							</td>
							<td class="quantity_wp">

								<form action="Index.php?view=cart&val=<?php echo $row['MaSP'] ?>" method="post">
									<a href="Index.php?view=cart&sub=<?php echo $row['MaSP'] ?>">- </a>
									<input style="text-align: center" type="text" value="<?php echo number_format($value) ?>" size="1" name="val" />
									<a href="Index.php?view=cart&ins=<?php echo $row['MaSP'] ?>"> + </a>
								</form>

							</td>
							
							<!-- <form action="Index.php?view=createcthd&id=<?php echo $row['MaSP'] ?>" method="post">
								<td style="border: none;padding: 10px; margin: 10px;" width="25%">
									<input type="text" value="<?php echo number_format($row['DonGia']) ?>" name="DonGia" readonly style="border: none; padding: 10px; margin: 10px; color: blue; text-align: center;" width="25%">
								</td>
								<td style="border: none;">
									<input type="text" value="<?php echo number_format($sum) . ' đ' ?>" name="TongCong" readonly style="border: none; color: blue; text-align: center;" width="25%">
								</td>
							</form> -->
							<td>
									<input type="text" value="<?php echo number_format($row['DonGia']) ?>" name="DonGia" readonly>
								</td>
								<td style="border: none;">
									<input type="text" value="<?php echo number_format($sum) . ' đ' ?>" name="TongCong" readonly>
								</td>
							
							<td>
								<a href="Index.php?view=cart&del=<?php echo $row['MaSP'] ?>"> X </a>
							</td>

					</tr>

				</tbody>
			</table>
<?php
						}
					}
				}
				
			}

			if ($total == 0) {
				echo 'Giỏ hàng chưa có sản phẩm nào.';
			} else {
?>
<div style="color : crimson; font-size: 30px; margin: 20px; padding: 15px;">Tổng tiền: <?php $_SESSION['TongTien'] = $total;
																						echo number_format($total) . ' đ';
																					} ?></div>
<?php
if (!isset($_SESSION['login']) && $total > 0) { ?>
	<?php $_SESSION['cart_t'] = 1; ?>
	<div align="right"> <a href="member/login.php" style="color : crimson; font-size: 30px; margin: 20px; padding: 15px; font-weight: bolder; text-decoration: none">Mua ngay </a> </div>
<?php }
if (isset($_SESSION['login']) && $total > 0) {
	$temp = $_SESSION['login']; ?>
	<div align="right" style="color : crimson; font-size: 30px; margin: 20px; padding: 15px; font-weight: bolder">
		<a href="Index.php?view=createcthd&id=<?php echo $temp ?>" style="color : crimson; font-size: 30px; margin: 20px; padding: 15px; font-weight: bolder; text-decoration: none">
			<input name="Mua" value="Mua ngay" type="submit">
		</a>
	</div>
<?php 	} ?>