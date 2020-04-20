	<?php
   $sql = "select * from sanpham where MaSP= $_GET[id]";
    $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
		
?>
<form action ="modules/quanlychitietsanpham/solve.php?id=<?php echo $row['MaSP'] ?> "method ="post" enctype="multipart/form-data">

<table border="1" class ="table">
  <tbody>
	
	  
    <tr>
      <td colspan = 2 align="center"style = "border: none;   text-align: center; color: red;margin: 5px;padding: 5px;" > <h3>Chỉnh sửa chi tiết sản phẩm</h3></td>
    </tr>
    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Tên sản phẩm</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="text" name = "txtTenSP"required value = "<?php echo $row['TenSP']?>" ></td>
    </tr>
	  <tr>
		  <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Ngày nhập kho:</td> 
		  <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><?php echo $row['NgayNhapKho'] ?></td>
	  </tr>
	  <tr>
		  <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Chỉnh sửa ngày nhập :</td>
		  <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="datetime-local"  name = "dateNgayNhap"></td>
   	 </tr> 
  	  <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Hạn sử dụng</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="text " required name = "HSD"  value = "<?php echo $row['HSD']?>"  ></td>
    </tr> 
    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Giá sản phẩm</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="text" required name = "txtGia"  value = "<?php echo $row['DonGia']?>"  ></td>
    </tr>
	    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Số lượng</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="text" required name = "txtSoLuong"  value = "<?php echo $row['SoLuong']?>"  ></td>
    </tr>
    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Hình ảnh</td>
	<td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><img  width = "60" height="60" src ="modules/quanlychitietsanpham/uploads/<?php echo $row['Link_img']?>"></td> </tr>
    <tr>  <td colspan="2" style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><input type="file" name = "photo"  ></td></tr>
   
    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Mô tả sản phẩm</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><textarea name = "txtMota" cols ="16" rows = "5" ><?php echo $row['MoTa']?></textarea></td>
    </tr>
	  <?php
	  	$sql1  = "SELECT * FROM loaisanpham";
	  	$run1 = mysqli_query($conn,$sql1);
	  	$sql2 = "SELECT * FROM nhomsanpham";
	  	$run2 = mysqli_query($conn,$sql2);
	    $sql3 = "SELECT * FROM donvivanchuyen";
	  	$run3 = mysqli_query($conn,$sql3);
	  
	  ?>
    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Hình thức sản phẩm</td>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><select name = "LoaiSP">
		  <?php
		  	while ($row1 = mysqli_fetch_array($run1)){	
				if($row['MaLoai'] == $row1['MaLoai']){
			?>
		  <option selected="selected" value="<?php echo $row1['MaLoai'];?>" ><?php echo $row1['TenLoai'];?></option>
		  <?php }else { ?>
		  <option value="<?php echo $row1['MaLoai'];?>" ><?php echo $row1['TenLoai'];?></option>
		 
			<?php	}}	?>
		  
		  </select></td>
    </tr>
	  
	 <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Loại sản phẩm</td>
		
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><select name = "NhomSP">
		  <?php
		  	while ($row2 = mysqli_fetch_array($run2)){	
				if($row['MaNhom'] == $row2['MaNhom']){
			?>
		  <option selected="selected" value =" <?php echo $row2['MaNhom'];?>"><?php echo $row2['TenNhom'];?></option>
		  <?php }else { ?>
			 <option  value =" <?php echo $row2['MaNhom'];?>"><?php echo $row2['TenNhom'];?></option>		
		  <?php	
			}}?>
		  
		  </select></td>
    </tr>
	  

	    <tr>
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;">Vận chuyển</td>
		
      <td style = "border: none;   text-align: left;margin: 5px;padding: 5px;"><select name = "NoiVanChuyen">
		  	<?php
		  	while ($row3 = mysqli_fetch_array($run3)){	
				if($row['MaDonVi'] == $row3['MaDinVi']){
			?> 
		  <option selected ="selected" value =" <?php echo $row3['MaDonVi'];?>"><?php echo $row3['TenDonVi'];?></option>
		  <?php }else { ?>
		   <option  value =" <?php echo $row3['MaDonVi'];?>"><?php echo $row3['TenDonVi'];?></option>
		   <?php	
			}}?>
		  </select></td>
	 <tr>
	   <td  align="center" style = "border: none;   text-align: left;margin: 5px;padding: 5px;" ><input type ="submit" name = "update" value = "Chỉnh sửa"  style ="border: none; background : white; color : darkgreen" ></td>
	  <td  style = "border: none;   text-align: left;margin: 5px;padding: 5px;" ><div align="center"><input type = "submit" name = "cancel" value = "Hủy"  style ="border: none; background : white; color : darkgreen"></div></td>
    </tr>
    </tr>
  </tbody>
</table>
</form>
