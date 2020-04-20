<?php
	$sql = "select * from nhomsanpham where MaNhom= $_GET[id]";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);		
?>
<form action ="modules/quanlyloaisanpham/solve.php?id=<?php echo $row['MaNhom'] ?>" method ="post" enctype="multipart/form-data">
	<table class = "table">
		<tbody>
			<tr>
				<td colspan = "2" style="border: none"> 
					<h1 style = " color: hotpink" align = "center" >
					Chỉnh sữa loại sản phẩm
					</h1>
				</td>
			</tr>
			<tr>
				<td colspan = "2" style="border: none">Tên &nbsp; 
				<input type ="text" name = "txtTenLoai" value ="<?php echo $row['TenNhom'] ?>" style ="text-align: center; font-family: Time New Roman; color: green "></td> 
			</tr>
			<tr>
				
				<td>
					<div align="center">
						<input type = "submit" name = "update" value = "Chỉnh sửa" style ="border: none; text-align:center; background : white; color : purple">
					</div>
				</td>
				<td style="border: none">
					<div align = "center">
						<input type = "submit" name = "cancel" value = "Hủy"       style ="border: none;text-align:center; background : white; color : purple"></td>
					</div>
			</tr>
		</tbody>
	</table>
</form>		