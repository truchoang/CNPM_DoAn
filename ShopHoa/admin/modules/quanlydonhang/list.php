<?php
		if (isset($_SESSION['login'])) $temp = $_SESSION['login'];
		$sql1 = "SELECT * FROM `hoadon`";
		$run1 = mysqli_query($conn,$sql1);
	
?>
	 
<table   class = "table" width ="100% ">
	<tr>
      <td  style="color: crimson; font-size: 20px;">ID</td>
	<td    style="color: crimson; font-size: 20px;">Ngày giờ lập</td>
      <td    style="color: crimson; font-size: 20px;">Nhân viên giải quyết</td>
	  <td style="color: crimson; font-size: 20px;">Trạng thái</td>
		<td  colspan = "3" style="color: crimson; font-size: 20px;">Xử lý</td>
    </tr>
	<?php
		while ($row1 = mysqli_fetch_array($run1, MYSQLI_ASSOC)) :
	?>
    <tr>	
      <td><?php echo $row1['MaHD'];?></td>
		  <td><?php echo $row1['NgayLapHD'];?></td>
      <td><?php if ($row1['MaNV'] == 0) echo "Chưa có"; else {
		    $id = $row1['MaNV'];
			$sql2= "SELECT * FROM thanhvien WHERE ID = $id ";
			$query2 = mysqli_query($conn,$sql2);
			$row2 = mysqli_fetch_array($query2);
			echo $row2['HoTen'].' - Mã số: ';
			echo $row2['ID'];	} 
		  ?></td>
			<td><?php echo $row1['TrangThai'];
		   if ($row1['TrangThai'] == "Chấp nhận" || $row1['TrangThai'] == "Đã hủy"  ){
		   ?></td>
		   <td ><a href = "index.php?quanly=quanlydonhang&action=details&id=<?php echo $row1['MaHD'];?>">Chi tiết</a></td>
		   <?php  }else { ?>
		   <td ><a href = "index.php?quanly=quanlydonhang&action=agree&id=<?php echo $row1['MaHD']?>&nv=<?php echo $temp?>">Xác nhận</a></td>
		   <td><a href = "index.php?quanly=quanlydonhang&action=destroy&id=<?php echo $row1['MaHD']?>&nv=<?php echo $temp?>">Hủy</a></td> 
		   <td ><a href = "index.php?quanly=quanlydonhang&action=details&id=<?php echo $row1['MaHD']?>">Chi tiết</a></td>
		   <?php } ?>
	 </tr>
	<?php endwhile; ?>
</table>

