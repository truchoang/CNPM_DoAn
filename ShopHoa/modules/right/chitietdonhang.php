<?php 
if(session_status()==PHP_SESSION_NONE) session_start();
if(isset($_SESSION['login'])) $id = $_SESSION['login'];
else header('location:../../ShopHoaTN/member/login.php');
$sql = "SELECT * From hoadon WHERE MaKH = $id";
$run = mysqli_query($conn,$sql);
?>
<center style = "font-size: 30px; color: darkblue; margin-top : 35px" > Đơn hàng của bạn </center>
<table class = "table">
	
	<tr> <td> Số hóa đơn </td> 
	 <td> Số lượng </td> 
	 <td> Tình trạng </td>
	</tr>
	<?php if ($run) while ($row = mysqli_fetch_array($run)){?>
	<tr>
	<td>
		<?php echo $row['MaHD'];
		$sql1 = "SELECT * FROM sanpham WHERE MaSP IN (SELECT MaSP FROM chitiethoadon WHERE MaHD IN (SELECT MaHD FROM hoadon))";
		$run1 = mysqli_query($conn,$sql1);
		$idhd = $row['MaHD'];
		$sql2 = "SELECT * FROM chitiethoadon WHERE MaHD = $idhd "; 
		$run2 = mysqli_query($conn,$sql2);
		if ($run1) while ($row1 = mysqli_fetch_array($run1) and $row2 = mysqli_fetch_array($run2)){
		?>
	</td>
	</tr>
	<tr>
	<td style = "border: none;">
		<?php echo $row1['TenSP']; ?>
		
	</td>
	<td>
	<?php echo $row2['SoLuong']; ?>
	</td>
	<td style = "border: none;">
		<?php }echo $row['TrangThai']; ?>
	</td>
	</tr>
	<?php }?>
</table>