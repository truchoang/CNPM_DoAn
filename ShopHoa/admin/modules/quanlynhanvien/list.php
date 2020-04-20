<?php
	$sql = "SELECT * FROM `thanhvien` WHERE `QuyenHan` = 'NV' ";
	$query = mysqli_query($conn,$sql); 		
?>
<table  class ="table"  >
  <tbody>
    <tr>
      <td>&nbsp;ID&nbsp;</td>
      <td >Họ Tên</td>
      <td>Ngày sinh</td>
	  <td>Giới tính</td>
	  <td>Địa chỉ</td>
	  <td >Email</td>
	  <td>SDT</td>
      <td colspan= "2">Quản lý</td>
    </tr>
    <tr>  
	<?php
		if($query)
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
      <td><?php echo $row['ID'];?></td>
      <td><?php echo $row['HoTen'];?></td>
	  <td><?php echo $row['NgaySinh'];?></td>
	  <td><?php echo $row['GioiTinh'];?> </td>
	  <td><?php echo $row['DiaChi'];?></td> 
	<td><?php echo $row['Email'];?></td>
	 <td><?php echo $row['SDT'];?></td>
	  <td style="padding: 5px;;width :50px;"><a href = "index.php?quanly=quanlynhanvien&action=update&id=<?php echo $row['ID']?>" style ="text-decoration:none;background: white;border:none;color: darkgreen">Chỉnh sửa</a></td>
	  <td  style=" padding: 5px; ;width :50px;"><a href ="modules/quanlynhanvien/solve.php?id=<?php echo $row['ID']?>" style ="text-decoration:none;background: white;border:none;color: darkgreen">Xóa</a></td>
    </tr>
	  <?php
		}
	  ?>
  </tbody>
</table>
