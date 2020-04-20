<?php
	$sql1 ="select * from nhomsanpham";
	$query1 = mysqli_query($conn,$sql1);
    $sql2 ="select * from loaisanpham";
	$query2 = mysqli_query($conn,$sql2);
	
?>
<div class = "content">
	<div class = "left"><?php include('left/list.php')?></div>
	<div class = "right">
		<?php 
	
	if (isset($_GET['view'])){
		$temp =$_GET['view']; 
	}
	else{
		$temp = '';
	}
	if ($temp == 'chitietloaisp'){
		include('right/chitietloaisp.php');
	}
	elseif ($temp == 'chitietsp'){
		include('right/chitietsp.php');
	}
	elseif ($temp == 'reg'){
		include('right/reg.php');
	}
	elseif ($temp == 'cart'){
		include('right/cart.php');
	}
	elseif ($temp == 'chitiethinhthuc'){
		include('right/chitiethinhthuc.php');
	}elseif ($temp == 'createcthd'){
		
		include('right/createcthd.php');
	}
	elseif ($temp == 'thongbao'){
		include('right/thongbao.php');
	}
	elseif ($temp == 'chitietdonhang'){
		include('right/chitietdonhang.php');
	}
	elseif (isset($_POST['search'])){
		include('right/search.php');
	}
	else{
		include('right/allproduct.php');
	}
	
		?></div>
</div>	       
<div class = "clear"></div>