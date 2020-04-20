<?php
	if (isset($_GET['action']) and $_GET['action'] == 'up'){
		$id =  $_GET['id'];
		$sqli = "UPDATE `thanhvien` SET `QuyenHan` = 'NV' WHERE `ID` = $id";
		$run = mysqli_query($conn,$sqli);
		header('location:index.php?quanly=quanlykhachhang&action=insert');
	}	
	$sql = "SELECT * FROM `thanhvien` WHERE `QuyenHan` = 'KH'";
	$query = mysqli_query($conn,$sql); 		
?>
<table class = "table">
	<tbody>
    <tr>
      <td style="color: crimson;font-size : 18px; border: none;">&nbsp;ID&nbsp;</td>
      <td style="color: crimson;font-size : 18px; border: none;">Họ Tên</td>
      <td style="color: crimson;font-size : 18px; border: none;">Username</td>
      <td style="color: crimson;font-size : 18px; border: none;" >Password</td>
      <td style="color: crimson;font-size : 18px; border: none;">Ngày sinh</td>
	  <td style="color: crimson;font-size : 18px; border: none;">Giới tính</td>
	  <td style="color: crimson;font-size : 18px; border: none;">Email</td>
	  <td style="color: crimson;font-size : 18px; border: none;">SDT</td>
      <td style="color: crimson;font-size : 18px; border: none;" >Quản lý</td>
    </tr>
    <tr>  
	<?php
		if($query)
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
		<td><?php echo $row['ID'];?></td>
	    <td><?php echo $row['HoTen'];?></td>
		<td><?php echo $row['UserName'];?></td>
		<td><?php echo $row['Password'];?></td>
		<td><?php echo $row['NgaySinh'];?></td>
		<td><?php echo $row['GioiTinh'];?> </td>
		<td><?php echo $row['Email'];?></td>
		<td><?php echo $row['SDT'];?></td>
		<td ><a href = "index.php?quanly=quanlykhachhang&action=update&id=<?php echo $row['ID']; ?>">Sửa</a></td>
		<td><a href ="quanlykhachhang/solve.php?id=<?php echo $row['ID']; ?>">Xóa</a></td>
		<form action="list.php" method="post" enctype="multipart/form-data">
		<td><a href ="index.php?quanly=quanlykhachhang&action=up&id=<?php echo $row['ID']; ?>">Cấp</a></td>
		</form>
	 </tr>
	 <?php
		}
	?>
	</tbody>
	
</table>
