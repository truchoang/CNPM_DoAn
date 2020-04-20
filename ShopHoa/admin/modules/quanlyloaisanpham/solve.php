<?php
	include('../../config.php');
	$id = $_GET['id'];
	$name=$_POST["txtTenLoai"];
	if (isset($_POST["insert"])){
		$sql = "INSERT INTO nhomsanpham(TenNhom) VALUES ('$name')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyloaisanpham&action=insert');
	}
	elseif(isset($_POST["update"])){
		$sql = "UPDATE nhomsanpham SET TenNhom ='$name' WHERE MaNhom ='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyloaisanpham&action=insert');
	}
	elseif(isset($_POST["cancel"])) {
				header('location:../../index.php?quanly=quanlyloaisanpham&action=insert');
	}
		   else{
			   $sql = "DELETE FROM nhomsanpham WHERE MaNhom ='$id'";
		mysqli_query($conn,$sql);
			   header('location:../../index.php?quanly=quanlyloaisanpham&action=insert');
		   }
	?>