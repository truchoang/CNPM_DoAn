	<?php
   $sql = "select * from thanhvien where ID = $_GET[id] and QuyenHan = 'NV' ";
   $query = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($query);
		
?>
<form action ="modules/quanlynhanvien/solve.php?id=<?php echo $row['ID'] ?> "method ="post" enctype="multipart/form-data">

<table  border="1"  class ="table">
  <tbody >
	
	  
    <tr>
      <td colspan = 2 align="center" style = "border: none; text-align: left;margin: 5px;padding: 5px;"> <h3>Chỉnh sửa thông tin nhân viên</h3></td>
    </tr>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Họ tên</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "txtTen"required value = "<?php echo $row['HoTen']?>" ></td>
    </tr>
  	  <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Username</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text " required name = "Username"  value = "<?php echo $row['UserName']?>"  ></td>
    </tr> 
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Password</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" required name = "pass"  value = "<?php echo $row['Password']?>"  ></td>
    </tr>
	    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Ngày sinh</td>
	  <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><?php echo $row['NgaySinh'] ?></td>
     <tr > 
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> Chỉnh sửa </td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="date" name = "dateNgayNhap"  value = "<?php echo $row['NgaySinh']?>" ></td></tr>
    </tr>
     <tr >
    	<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Giới tính</td>
    	<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type ="radio" name ="Gioitinh" value ="Nam" checked="checked">Nam
		<input type ="radio" name ="Gioitinh" value ="Nữ">Nữ
		<input type ="radio" name ="Gioitinh" value ="Khác">Khác</td>
    </tr>
	  
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Địa chỉ</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" required name = "diachi"  value = "<?php echo $row['DiaChi']?>" ></td>
    </tr>
	     <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Email</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="email" required name = "email"  value = "<?php echo $row['Email']?>" ></td>
    </tr>
	      <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">SDT</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="tel" required name = "sdt"  value = "<?php echo $row['SDT']?>" ></td>
    </tr>
	 <tr>
	   <td  align="center" style="border: none" ><input type ="submit" name = "update" value = "Chỉnh sửa"  style ="background: white;border:none;color: darkgreen" ></td>
	  <td style="border: none" ><div align="center" ><input type = "submit" name = "cancel" value = "Hủy"  style ="background: white;border:none;color: darkgreen"></div></td>
    </tr>
    </tr>
  </tbody>	
</table>
</form>
