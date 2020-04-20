<form action="Index.php?" method ="post" enctype="multipart/form-data" class ="search">
	<input id = "text" type="text" name="searchb" placeholder="Tìm sản phẩm""> 
	<br>
	<p class="txt_search">Nhập tên sản phẩm</p>
	<br> <br> 
	<input  id = "submit" type ="submit"  name = "search" value ="Search"> <br> <br> <br>
</form>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
<?php
	if(session_status()==PHP_SESSION_NONE) session_start();
	if (isset($_GET['id'])){
		$sql1 ="select * from nhomsanpham where MaNhom = $_GET[id]";
		$query1 = mysqli_query($conn,$sql1);
		$sql2 ="select * from loaisanpham where MaLoai = $_GET[id]";
		$query2 = mysqli_query($conn,$sql2);
		$row1 = mysqli_fetch_array($query1);
		$row2 = mysqli_fetch_array($query2);
	}
?>
<?php 
	if (isset($_GET['view'])){
		$temp =$_GET['view']; 
	}
	else{
		$temp = '';
	}
	if ($temp == 'chitietloaisp'){ ?>
		<p style ="color:#493E3E ">SẮP XẾP</p><hr color ="#00BCD4"> <br>
		<form action="Index.php?view=chitietloaisp&id=<?php echo $row1['MaNhom'] ?>" method ="post" enctype="multipart/form-data" class ="search">
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name ="select" value = "up" > Sắp xếp theo giá tăng dần</p> 
			<br>
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name = "select" value ="down"> Sắp xếp theo giá giảm dần
			</p><br>
			<input  id = "submit" type ="submit"  name = "apply" value ="Apply">
			<br> <br> 
		</form>
<?php }	
	elseif ($temp == 'chitiethinhthuc'){ ?>
		<p style ="color:#493E3E ">SẮP XẾP</p><hr color ="#00BCD4"> <br>
		<form action="Index.php?view=chitiethinhthuc&id=<?php echo $row2['MaLoai'] ?>" method ="post" enctype="multipart/form-data" class ="search">
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name ="select" value = "up" > Sắp xếp theo giá tăng dần</p> 
			<br>
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name = "select" value ="down"> Sắp xếp theo giá giảm dần</p>
			<br> <br>
			<input  id = "submit" type ="submit"  name = "apply" value ="Apply"> 
			<br> <br> <br>
		</form>
<?php	}
	else{ 
		?>
		<p style ="color:#493E3E "> SẮP XẾP</p><hr color ="#00BCD4"> <br>
		<form action="Index.php" method ="post" enctype="multipart/form-data" class ="search">
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name ="select" value = "up" > Sắp xếp theo giá tăng dần</p> <br>
			<p style ="color: #C0BCBC; margin-left: 35px "> <input type = "radio" name = "select" value ="down"> Sắp xếp theo giá giảm dần</p><br> <br>
			<input  id = "submit" type ="submit"  name = "apply" value ="Apply"> <br> <br> <br>
		</form>
<?php } ?>	
