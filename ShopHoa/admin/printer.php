<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel = "stylesheet" type = "text/css" href ="stl/style.css" />
<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
<title>Hóa đơn</title>
</head>
<body>
<?php 
    require ("config.php");
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM chitiethoadon WHERE MaHD = $id";
$query = mysqli_query($conn, $sql);

// lay thong tin khách hàng
//$rowCustomer = mysqli_fetch_assoc($query);

$xhtml = '';
$sum =0;
while($row = mysqli_fetch_assoc($query)){
	$rowCustomer = $row;
	
	$idProduct = $row['MaSP'];
	
	$sql = "SELECT * FROM sanpham WHERE MaSP = $idProduct";
	
	$query = mysqli_query($conn, $sql);

	$product = mysqli_fetch_assoc($query);

	
	$img = "modules/quanlychitietsanpham/uploads/" . $product['Link_img'];

	$tong = $row['SoLuong'] * $product['DonGia'];
    $sum += $tong;
	$xhtml .= '<tr>
					<td>'.$product['MaSP'].'</td>
					<td>'.$product['TenSP'].' </td>

					<td>'.number_format($product['DonGia']).'</td>
					<td>'.$row['SoLuong'].'</td>
					<td>'.number_format($tong).'</td>
				</tr>';
}

?>
<div class="main-container printer">
	<h1 class="title_panel">Thông tin hóa đơn</h1>
	<table class="table">
		<tr>
			<td> Mã hóa đơn: </td>
			<td><b>#<?php echo $rowCustomer['MaHD'] ?></b></td>
		</tr>
		<tr>
			<td> Họ tên: </td>
			<td><b><?php echo $rowCustomer['Ten'] ?></b></td> 
		</tr>
		<tr>
			<td>Điện thoại: </td>
			<td><b><?php echo $rowCustomer['SDT'] ?></b></td>
		</tr>
		<tr>
			<td> Địa chỉ </td>
			<td><b><?php echo $rowCustomer['DiaChi'] ?></b></td>
		</tr>
			
	</table>
	<h1 class="title_panel">Thông tin sản phẩm</h1>
	<table class="table">
		<tr>
			<td>Mã SP</td>
			<td>Tên </td>
			
			<td>Giá</td>
			<td>Số lượng</td>
			<td>Tổng</td>
		</tr>
		<?php echo $xhtml; ?>
			<tr>
                <td>Tổng: </td>
                <td colspan="5"><?php echo number_format($sum)?> VNĐ</td>
            </tr>
	</table>
</div>
</body>
</html>
<script>


    window.print();
   
</script>