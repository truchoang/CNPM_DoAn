<?php
	include('../../config.php');
	$id       =$_GET['id'];
	$name     =$_POST["txtTenSP"];
	$describe =$_POST["txtMota"];
	$cost     =$_POST["txtGia"];
	$number   =$_POST["txtSoLuong"]; 
	$hsd      =$_POST["HSD"];
	$img      =$_FILES['photo']['name'];
	$img_temp =$_FILES['photo']['tmp_name'];
	move_uploaded_file($img_temp,'uploads/'.$img);
	$date =$_POST["dateNgayNhap"];
	$MaLoai = $_POST["LoaiSP"];
	$MaNhom = $_POST["NhomSP"];
	$MaDV  = $_POST["NoiVanChuyen"];
if (isset($_POST["insert"])){
		$sql = "INSERT INTO `sanpham`( `MaLoai`, `MaNhom`, `MaDVGiao`, `DonGia`, `SoLuong`, `NgayNhapKho`, `TenSP`, `Link_img`, `MoTa`,`HSD`) 
		VALUES ($MaLoai,$MaNhom,$MaDV,$cost,$number,'$date','$name','$img','$describe',$hsd)";
		mysqli_query($conn,$sql);
header('location:../../index.php?quanly=quanlychitietsanpham&action=insert');
}	
elseif(isset($_POST["update"])){
	if ($img != '' && $date  != ''){
		$sql = "UPDATE `sanpham` SET
		`MaLoai` = $MaLoai,
		`MaNhom` = $MaNhom,
		`MaDVGiao` =$MaDV,
		`DonGia`=$cost,
		`SoLuong` =$number,
		`TenSP`='$name',
		`NgayNhapKho` = '$date',
		`Link_img` = '$img'
		`MoTa` ='$describe',
		`HSD` = $hsd
		WHERE `MaSP` ='$id'";
		}
	elseif($img != ''){
		$sql = "UPDATE `sanpham` SET
		`MaLoai` = $MaLoai,
		`MaNhom` = $MaNhom,
		`MaDVGiao` =$MaDV,
		`DonGia`=$cost,
		`SoLuong` =$number,
		`TenSP`='$name',
		`Link_img` = '$img',
		`MoTa` ='$describe',
		`HSD` = $hsd,		
		`MaLoai` = $MaLoai

		WHERE `MaSP` ='$id'";}
	elseif ($date != ''){
		$sql = "UPDATE `sanpham` SET 
		`MaNhom` = $MaNhom,
		`MaDVGiao` =$MaDV,
		`DonGia`=$cost,
		`SoLuong` =$number,
		`TenSP`='$name',
		`NgayNhapKho` = '$date',
		`MoTa` ='$describe',
		`HSD` = $hsd
		WHERE `MaSP` ='$id'";
	}else {
		$sql = "UPDATE `sanpham` SET
		`MaLoai` = $MaLoai,
		`MaNhom` = $MaNhom,
		`MaDVGiao` =$MaDV,
		`DonGia`=$cost,
		`SoLuong` =$number,
		`TenSP`='$name',	
		`MoTa` ='$describe',
		`HSD` = $hsd
		WHERE `MaSP` ='$id'";	
	}
		mysqli_query($conn,$sql);
header('location:../../index.php?quanly=quanlychitietsanpham&action=insert');
	}
	elseif(isset($_POST["cancel"])) {
				header('location:../../index.php?quanly=quanlychitietsanpham&action=insert');
	}
else{
		$sql = "DELETE FROM sanpham WHERE MaSP = '$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlychitietsanpham&action=insert');
}
	?>