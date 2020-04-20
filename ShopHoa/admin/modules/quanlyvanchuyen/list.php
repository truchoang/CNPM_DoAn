<?php
	
	$sql = "SELECT * FROM donvivanchuyen";
	$run = mysqli_query($conn,$sql);
?>

<table  class = "table">
	<tr>
		<td style="color: red; font-size: 20px;">ID</td>
		<td   style="color: red; font-size: 20px;">Tên Đơn vị</td>
		<td colspan="2"  style="color: red; font-size: 20px;">Tùy chọn</td>
    </tr>
	<?php
	if ($run){
		while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
	?>
    <tr>	
		<td><?php echo $row['MaDonVi'];?></td>
		<td><?php echo $row['TenDonVi'];?></td>
		<td><a href = "index.php?quanly=quanlyvanchuyen&action=update&id=<?php echo $row['MaDonVi']?>" style = " text-decoration: none; color: hotpink">Chỉnh sửa</a></td>
		<td ><a href = "modules/quanlyvanchuyen/solve.php?id=<?php echo $row['MaDonVi'] ?>" style = " text-decoration: none; color : crimson">Xóa</a></td>
	</tr>
	<?php endwhile; }?>
</table>
