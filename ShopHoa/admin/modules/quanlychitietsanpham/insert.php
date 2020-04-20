<form action ="modules/quanlychitietsanpham/solve.php" method ="post" enctype="multipart/form-data">
<table   class ="table" border = "1"  >
  <tbody>
	
	  
    <tr >
		<td style = "border: none;margin: 5px;padding: 5px;" colspan ="2" align="center"> Thêm chi tiết sản phẩm</td>
    </tr>
    <tr>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Tên sản phẩm</td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "txtTenSP" required></td>
    </tr>
	<tr>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Ngày nhập kho</td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="datetime-local" name = "dateNgayNhap" required ></td>
    </tr> 
	<tr>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Số ngày tàn</td>	
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text " name = "HSD" required placeholder = "Nhập vào số ngày..." ></td>
    </tr> 
    <tr>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Giá sản phẩm</td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "txtGia" required ></td>
    </tr>
	<tr >
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Số lượng</td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "txtSoLuong" required ></td>
    </tr>
    <tr>
		<td  colspan = "2" style = "border: none; text-align: left;margin: 5px;padding: 5px;">Hình ảnh</td>
	</tr>
    <tr>
		<td colspan="2" style = "border: none; width: 30px; text-align: left;margin: 5px;padding: 5px;"><input type="file" name = "photo" required ></td>
    </tr>
    <tr>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Mô tả sản phẩm</td>
		<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><textarea name = "txtMota" cols ="16" rows = "5" ></textarea></td>
    </tr>
	  <?php
	  	$sql1 = "SELECT * FROM loaisanpham";
	  	$run1 = mysqli_query($conn,$sql1);
	  	$sql2 = "SELECT * FROM nhomsanpham";
	  	$run2 = mysqli_query($conn,$sql2);
	    $sql3 = "SELECT * FROM donvivanchuyen";
	  	$run3 = mysqli_query($conn,$sql3);
	  
	  ?>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Hình thức sản phẩm</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><select name = "LoaiSP">
	  <?php
		  	while ($row1 = mysqli_fetch_array($run1)){	
			?>
		  <option value="<?php echo $row1['MaLoai'];?>" ><?php echo $row1['TenLoai'];}?></option></select></td>
    </tr>
	  
	 <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Loại sản phẩm</td>
		
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><select name = "NhomSP">
		   <?php
		  	while ($row2 = mysqli_fetch_array($run2)){	
			?>
		  <option value =" <?php echo $row2['MaNhom'];?>"><?php echo $row2['TenNhom'];}?></option></select></td>
    </tr>
	  

	    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Vận chuyển</td>
		
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><select name = "NoiVanChuyen">
		  	<?php
		  	while ($row3 = mysqli_fetch_array($run3)){	
			?> 
		  <option  value =" <?php echo $row3['MaDonVi'];?>"><?php echo $row3['TenDonVi'];}?></option></select></td>
	 <tr>
	   <td style = "border: none; text-align: right" colspan=" 2" align="center" >
	   <input type ="submit" name = "insert" value = "Thêm sản phẩm" style ="border: none; background : white; color : darkgreen"></td>
    </tr>
    </tr>
  </tbody>
</table>
</form>
