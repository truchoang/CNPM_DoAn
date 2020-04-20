<?php
	include('../../config.php');
	$id = $_GET['id'];
	$name=$_POST["txtTenLoai"];
	if (isset($_POST["insert"])){
		$sql = "INSERT INTO loaisanpham(TenLoai) VALUES ('$name')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyhinhthuc&action=insert');
	}
	elseif(isset($_POST["update"])){
		$sql = "UPDATE loaisanpham SET TenLoai ='$name' WHERE MaLoai ='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyhinhthuc&action=insert');
	}
	elseif(isset($_POST["cancel"])) {
				header('location:../../index.php?quanly=quanlyhinhthuc&action=insert');
	}
		   else{
			   $sql = "DELETE FROM loaisanpham WHERE MaLoai ='$id'";
		mysqli_query($conn,$sql);
			   header('location:../../index.php?quanly=quanlyhinhthuc&action=insert');
		   }
	?>