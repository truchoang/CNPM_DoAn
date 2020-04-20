<?php
	$sql = "SELECT * FROM loaisanpham";
	$run = mysqli_query($conn,$sql);
?>

<table   class = "table" style ="width : 100%"><tr>
      <td  style="color: crimson; font-size: 20px;">ID</td>
      <td    style="color: crimson; font-size: 20px;">Tên Hình thức</td>
      <td colspan="2" style="color: crimson; font-size: 20px;">Tùy chọn</td>
    </tr>
	<?php
	if ($run){
		while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
	?>
    <tr>	
      <td><?php echo $row['MaLoai'];?></td>
      <td><?php echo $row['TenLoai'];?></td>
      <td ><a href = "index.php?quanly=quanlyhinhthuc&action=update&id=<?php echo $row['MaLoai']?>">Chỉnh sửa</a></td>
		<td ><a href = "modules/quanlyhinhthuc/solve.php?id=<?php echo $row['MaLoai'] ?>">Xóa</a></td>
	</tr>
	<?php endwhile; }?>
</table>
