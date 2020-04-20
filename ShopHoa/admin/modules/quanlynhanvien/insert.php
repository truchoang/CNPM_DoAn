<form action ="modules/quanlynhanvien/solve.php" method ="post" enctype="multipart/form-data">
<table  border="1" class ="table">
  <tbody> 
    <tr >
      <td style = "border: none;margin: 5px;padding: 5px;" colspan = 2 align="center"> Thêm nhân viên</td>
    </tr>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;" >Họ Tên</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;" ><input type="text" name = "txtTen"  required  ></td>
    </tr>
	  <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Ngày sinh</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="date" name = "dateNgayNhap"required  ></td>
    </tr> 
	  	  <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Username</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text " name = "Username" required  ></td>
    </tr> 
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Password</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "pass" required  ></td>
    </tr>
	    <tr >
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Địa chỉ</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "diachi" required  ></td>
    </tr>
	 	    <tr >
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Số điện thoại</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="tel" name = "sdt" required ></td>
    </tr>
	  <tr>
    	<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Giới tính</td>
    	<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type ="radio" name ="Gioitinh" value ="Nam"   checked="checked">Nam
		<input type ="radio" name ="Gioitinh" value ="Nữ">Nữ
		<input type ="radio" name ="Gioitinh" value ="Khác">Khác</td>
    </tr>
	    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Email</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="email" name = "email" required  </td>
    </tr>
	  <tr>	   <td style = "border: none" colspan=" 2" align="center" ><input type ="submit" name = "insert"  value = "Thêm " style ="background: white;border:none;color: darkgreen"></td>
    </tr>
    </tr>
  </tbody>
</table>
</form>
