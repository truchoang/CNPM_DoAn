<?php 
	@include_once '../../admin/config.php';
	if(session_status()==PHP_SESSION_NONE) session_start();
	if (!isset($_SESSION['login'])) header('location: member/login.php');
	else  { 
	$temp = $_SESSION['login'];
	$sql = "SELECT * FROM thanhvien WHERE ID = $temp ";
	
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
	if(isset($_POST['thanhtoan'])){
		include_once '../../admin/config.php';
		$namekh = $_POST['HoVaTen'];
		$SDT = $_POST['SDT'];
		$DiaChi = $_POST['DiaChi'];
		$datetime = date("Y-m-d-H-i-s");
		#-------------------------------------------------------------------------------------#
		$sql1 = "INSERT INTO `hoadon`(`MaKH`,`NgayLapHD`) VALUES ($temp,'$datetime')";
		
		$query1 = mysqli_query($conn,$sql1);
		#-------------------------------------------------------------------------------------#
		$sl = "SELECT * FROM `hoadon` WHERE `MaKH` = $temp and `NgayLapHD` = '$datetime' LIMIT 1";
		$run = mysqli_query($conn,$sl);
		$MaHD = mysqli_fetch_array($run);
		$thay = $MaHD['MaHD'];
		$_SESSION['HD'] = $thay;
		#-------------------------------------------------------------------------------------#
		foreach ($_SESSION as $name => $value){
			if ($value >0){
				if (substr($name,0,4) == 'cart'){
					$id = substr($name,4,strlen($name)-4);
					$sql = "SELECT * FROM sanpham WHERE MaSP ='".$id."'";
					$query = mysqli_query($conn,$sql);
					if ($query) {
						while($row = mysqli_fetch_array($query)){
							if ($value > $row['SoLuong']) $value = $row['SoLuong'];
							$sql2 =" INSERT INTO `chitiethoadon`(`MaHD`,`MaSP`,`Ten`,`SDT`,`DiaChi`,`SoLuong`)
							VALUES($thay,$id,'$namekh','$SDT','$DiaChi',$value)";
							
							$query2 = mysqli_query($conn,$sql2);
							$sql3 =" UPDATE `sanpham` SET `SoLuong` =  `SoLuong` - $value WHERE MaSP = $id";
							$query3 = mysqli_query($conn,$sql3);
						}
					header('location: thongbao.php ');
					}
				}
			}
		}
	}
?> 
<form action = "modules/right/createcthd.php" method="post" >
<table class = "table" >
  <tbody>
    <tr>
      <td colspan="2" style = " font-size: 25px; color: red">Thông tin khách hàng </td>
    </tr>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;padding-top: 45px;">Họ và Tên  </td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;padding-top: 45px;"><input style = "width :300px; text-align:center" type = "text " name = "HoVaTen" value = "<?php echo $row['HoTen']; ?>"></td>
    </tr>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Số điện thoại</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"><input style = "width :300px; text-align:center" type = "tel" name = "SDT" value  = "<?php echo $row['SDT']; ?>"> </td>
    </tr>
    <tr>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Địa chỉ</td>
      <td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> <textarea  style = "width :300px; text-align:center" name ="DiaChi" rows = "5" cols = "auto"><?php echo $row['DiaChi']; ?> </textarea> </td>
    </tr>
	<tr>
      <td colspan="2"style = " font-size: 25px; color: hotpink">Thông tin sản phẩm</td>
	</tr> 
  </tbody>
</table>
<?php 
	if (isset($_POST['Mua'])) header('location: Index.php?view=createcthdhd&id=$temp');?>
	<table class = "table">
		<tr>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;padding-top: 45px;">Tên Sản phẩm</td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;">Đơn giá</td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> Số lượng</td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> Tổng cộng </td>
		</tr>
		<?php
			foreach ($_SESSION as $name => $value){
				if ($value >0){
			
				if (substr($name,0,4) == 'cart'){
					$id = substr($name,4,strlen($name)-4);
					$sql = "SELECT * FROM sanpham WHERE MaSP ='".$id."'";
					$query = mysqli_query($conn,$sql);
					if ($query) 
						while($row = mysqli_fetch_array($query)){ 
					if ($value > $row['SoLuong']) $value = $row['SoLuong'];
		?>
		<tr>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;padding-top: 45px;"> <?php echo $row['TenSP'] ?> </td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> <?php echo $row['DonGia'] ?> </td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> <?php echo $value ?> </td>
			<td style = "border: none; text-align: left;margin: 5px;padding: 5px;"> <?php echo number_format($value*$row['DonGia']).' đ'; }}}} ?> </td>
		</tr>
		<tr> 
			<td> 
				<?php
					
					if (isset($_SESSION['TongTien'])) echo 'Tổng cộng: '. number_format($_SESSION['TongTien']). ' đ';?>
			</td> 
		</tr>
	</table>
	<p colspan="2"> <center><input type = "submit" name ="thanhtoan" value = "Thanh toán" style = " background: none; border: none; color: green; font-size: 20px;"> </center></p>
</form> 
<?php
	} 
?>
