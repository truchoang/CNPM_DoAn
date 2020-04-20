<?php
	include('../../config.php');
	$id = $_GET['id'];
	$name=$_POST["txtTenLoai"];
	if (isset($_POST["insert"])){
		$sql = "INSERT INTO donvivanchuyen(TenDonvi) VALUES ('$name')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyvanchuyen&action=insert');
	}
	elseif(isset($_POST["update"])){
		$sql = "UPDATE donvivanchuyen SET TenDonVi ='$name' WHERE MaDonVi ='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyvanchuyen&action=insert');
	}
	elseif(isset($_POST["cancel"])) {
				header('location:../../index.php?quanly=quanlyvanchuyen&action=insert');
	}
		   else{
			   $sql = "DELETE FROM donvivanchuyen WHERE MaDonVi ='$id'";
		mysqli_query($conn,$sql);
			   header('location:../../index.php?quanly=quanlyvanchuyen&action=insert');
		   }
	?>