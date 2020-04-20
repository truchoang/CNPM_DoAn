<?php
	$sql = "select * from donvivanchuyen where MaDonVi= $_GET[id]";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
		
?>
<form action ="modules/quanlyvanchuyen/solve.php?id=<?php echo $row['MaDonVi'] ?>" method ="post" enctype="multipart/form-data">
<table class = "table">
  
    <tr>
      <td colspan="2" style = "border: none;"><div align="center">Chỉnh sữa vận chuyển</div></td>
    </tr>
		
    <tr> 
      <td align = "left" style = "border: none;">Tên &nbsp; <input type ="text" name = "txtTenLoai" value ="<?php echo $row['TenDonVi'] ?>" style ="text-align: center; font-family: Time New Roman; color: green "></td> 
    </tr>
	
    <tr>
	 <td  ><div align="center"><input type = "submit" name = "update" value = "Chỉnh sửa" style ="border: none; background : white; color : darkgreen"></div></td>
	 <td  style = "border: none;"><div align="center"><input type = "submit" name = "cancel" value = "Hủy" style ="border: none; background : white; color : darkgreen"></div></td>
    </tr>
 	</table>
</form>		