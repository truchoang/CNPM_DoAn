<?php
	include('../../config.php');
	if (isset($_GET['id'])) $id   =$_GET['id'];
	$name     =$_POST["txtTen"];
	$ngaysinh =$_POST["dateNgayNhap"];
	$UN     =$_POST["Username"];
	$passw   =$_POST["pass"]; 
	$diachi     =$_POST["diachi"];
	$sdt =$_POST["sdt"];
	$sex = $_POST["Gioitinh"];
	$mail = $_POST["email"];
if(isset($_POST["cancel"])) {
				header('location:../../index.php?quanly=quanlynhanvien&action=insert');
	}
$sql = "SELECT* FROM `thanhvien` WHERE `UserName` = '$UN'  and `ID` != $id";
$run = mysqli_query($conn,$sql);
if (mysqli_num_rows($run) > 0) { echo  '<script> alert("Username đã có người dùng.")</script>';}
else{
	$sql = "SELECT* FROM `thanhvien` WHERE `Email` = '$mail'  and `ID` != $id";
	$run = mysqli_query($conn,$sql);
	if (mysqli_num_rows($run) > 0) { echo  "Email đã có người dùng.";}
	else {
		$sql = "SELECT* FROM `thanhvien` WHERE `SDT` = '$sdt'  and `ID` != $id";
		$run = mysqli_query($conn,$sql);
		if (mysqli_num_rows($run) > 0) { echo  "SDT đã có người dùng.";}
		else {
		//
			if (isset($_POST["insert"])){
		$sql = "INSERT INTO `thanhvien`( `HoTen`, `NgaySinh`, `UserName`, `Password`, `DiaChi`, `SDT`, `GioiTinh`, `Email`,`QuyenHan`)
		VALUES ('$name','$ngaysinh','$UN','$passw','$diachi','$sdt','$sex','$mail','NV')";
		mysqli_query($conn,$sql);
header('location:../../index.php?quanly=quanlynhanvien&action=insert');
}	
elseif(isset($_POST["update"])){
	if ($ngaysinh != '00-00-0000'){
		$sql = "UPDATE `thanhvien` SET
			`HoTen` = '$name',
			`NgaySinh` = '$ngaysinh',
			`UserName` = '$UN',
			`Password` = '$passw',
			`DiaChi` = '$diachi',
			`SDT` = '$sdt',
			`GioiTinh` = '$sex',
			`Email` = '$mail'
		WHERE `ID` ='$id'";
	}else {
		$sql = "UPDATE `thanhvien` SET
			`HoTen` = '$name',
			`UserName` = '$UN',
			`Password` = '$passw',
			`DiaChi` = '$diachi',
			`SDT` = '$sdt',
			`GioiTinh` = '$sex',
			`Email` = '$mail'
		WHERE `ID` ='$id'";
	}
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlynhanvien&action=insert');
	}
else{

		$sql = "DELETE FROM thanhvien WHERE ID = '$id'";
		$query = mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlynhanvien&action=insert');
}
		}
		
	}
}
?>