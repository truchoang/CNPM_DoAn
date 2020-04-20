<?php if (isset($_GET['action'])){
		$temp = $_GET['action'];
	}else{
		$temp = '';
	}
	
?>
<div class ="chitiet" >

<?php
	if ($temp == 'details') {
		include('modules/quanlydonhang/chitiet.php');
	}
	else{

?>
</div>
<div class = " right">
	<?php
	if ($temp == 'agree'){ 
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			if(isset($_GET['nv'])) $nv = $_GET['nv'];
			$sql = "UPDATE  `hoadon` SET `MaNV` = $nv, `TrangThai` = N'Chấp nhận' WHERE `MaHD` = $id";
			$query=mysqli_query($conn,$sql);
			$sql5 = " SELECT * FROM `sanpham` WHERE `SoLuong` = 0 and MaSP in (
				SELECT MaSP FROM chitiethoadon WHERE MaHD in (
					SELECT MaHD FROM hoadon)			
			)";
			$query5 = mysqli_query($conn,$sql5);
			while ($row = mysqli_fetch_array($query5)){
			$link = "modules/quanlychitietsanpham/uploads/".$row['Link_img'];
			unlink($link);
			} // Xóa sản phẩm có số lượng = 0
			$sql5 = " DELETE FROM `sanpham` WHERE `SoLuong` = 0 and MaSP in (    
				SELECT MaSP FROM chitiethoadon WHERE MaHD in (
					SELECT MaHD FROM hoadon)			
			)";
			$query5= mysqli_query($conn,$sql5);
		}
	}
	if ($temp == 'destroy'){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			if(isset($_GET['nv'])) $nv = $_GET['nv'];
			$sql = "UPDATE  `hoadon` SET `MaNV` = $nv, `TrangThai` = N'Đã hủy' WHERE `MaHD` = $id";
			$query=mysqli_query($conn,$sql);
			} 
			$sql1 = " SELECT * FROM `chitiethoadon` where  `MAHD` = $id";
			$query1 = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($query1)){
			$value = $row['SoLuong'];
			$sql5 = " UPDATE `sanpham` SET `SoLuong` = `SoLuong` + $value WHERE  MaSP in (    
				SELECT MaSP FROM chitiethoadon WHERE MaHD in (
					SELECT MaHD FROM hoadon)			
			)";
			$query5= mysqli_query($conn,$sql5);}
		}
		?>
		<?php include('modules/quanlydonhang/list.php'); ?>
</div>
	<?php } ?>