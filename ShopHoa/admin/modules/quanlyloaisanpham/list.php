<?php
	
	$sql = "SELECT * FROM nhomsanpham";
	$run = mysqli_query($conn,$sql);
?>

<table class = "table">
      <td style="color: crimson; font-size: 20px;">ID</td>
      <td style="color: crimson; font-size: 20px;">Tên Loại</td>
      <td colspan="2" style="color: crimson; font-size: 20px;">Tùy chọn</td>
    </tr>
	<?php
	if ($run){
		while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
	?>
    <tr>	
		<td><?php echo $row['MaNhom'];?></td>
		<td><?php echo $row['TenNhom'];?></td>
		<td><a href = "index.php?quanly=quanlyloaisanpham&action=update&id=<?php echo $row['MaNhom']?>">Chỉnh sửa</a></td>
		<td><a href = "modules/quanlyloaisanpham/solve.php?id=<?php echo $row['MaNhom'] ?>">Xóa</a></td>
	</tr>
	<?php endwhile; }?>
</table>
