<?php
	$sql = "SELECT * FROM `sanpham`,`loaisanpham`,`nhomsanpham`,`donvivanchuyen` 
	WHERE sanpham.MaLoai = loaisanpham.MaLoai
	and sanpham.MaNhom = nhomsanpham.MaNhom
	and sanpham.MaDVGiao = donvivanchuyen.MaDonVi
	ORDER BY MaSP ";
	$query = mysqli_query($conn,$sql); 		
?>

<table  class ="table"  >
  <tbody>
    <tr>
		<td style=" color: crimson;font-size : 18px; border: none;;width :50px;">STT</td>
		<td style=" color: crimson;font-size : 18px; border: none;;width :50px;">&nbsp;ID&nbsp;</td>
		<td style="color: crimson;font-size : 18px; border: none; width :50px;">Tên sản phẩm</td>
		<td style="color: crimson;font-size : 18px; border: none;;width :100px;">Hình ảnh</td>
		<td style="color: crimson;font-size : 18px; border: none;width :50px;" >Giá</td>
		<td style="color: crimson;font-size : 18px; border: none;width :50px;">Số lượng</td>
		<td style="color: crimson;font-size : 18px; border: none;width :100px;">Ngày vào kho</td>
		<td style="color: crimson;font-size : 18px; border: none;;">Hạn tàn</td>
		<td style="color: crimson;font-size : 18px; border: none;">Hình thức</td>
		<td style="color: crimson;font-size : 18px; border: none;">Loại</td>
		<td style="color: crimson;font-size : 18px; border: none;">Đơn Vị</td>
		<td style="color: crimson;font-size : 18px; border: none;;" colspan=" 2">Quản lý</td>
    </tr>

	
    <tr>  
	<?php
		$i = 0;
		if($query)
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	?>
	  <td><?php echo $i;?></td>
      <td><?php echo $row['MaSP'];?></td>
      <td><?php echo $row['TenSP'];?></td>
      <td><img src="modules/quanlychitietsanpham/uploads/<?php echo $row['Link_img'];?>" width ="100" height="100"></td>
      <td><?php echo $row['DonGia'];?></td>
      <td><?php echo $row['SoLuong'];?></td>
	  <td><?php echo $row['NgayNhapKho'];?></td>
	  <td><?php echo $row['HSD'];?> </td>
	  <td><?php echo $row['TenLoai'];?></td> 
	<td><?php echo $row['TenNhom'];?></td>
	 <td><?php echo $row['TenDonVi'];?></td>
	
	  <td><a href = "index.php?quanly=quanlychitietsanpham&action=update&id=<?php echo $row['MaSP']?>" style ="text-decoration: none; color: darkgreen">Chỉnh sửa</a></td>
	  <td><a href ="modules/quanlychitietsanpham/solve.php?id=<?php echo $row['MaSP']?>" style ="text-decoration: none;color: darkgreen">Xóa</a></td>
    </tr>
	  <?php
	$i++;
		}
	  ?>
  </tbody>
</table>
