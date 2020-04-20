<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_GET['action']) && $_GET['action'] == "logout") {
	unset($_SESSION['login']);
	header('location: Index.php');
} ?> <?php
				if (isset($_SESSION['login'])) {
					$temp = $_SESSION['login'];
					$sql = "SELECT HoTen FROM thanhvien WHERE ID = $temp ";
					$run = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($run);
				?>
	<div id="head">
		<div>
			<p>Xin chào &nbsp; </p>
			<a href="">
				<p><?php echo $row['HoTen']; ?> </p>
			</a>
		</div>
		<a href="Index.php?action=logout">
			<p align="right" style="font-size: 20px">Đăng xuất </p>
		</a>
	</div>
<?php
				} else { ?>
	<div id="head">
		<a href="member/login.php" style="text-decoration: none; color: blue; float: right">
			<p align="right" style="font-size: 20px">Đăng nhập</p>
		</a>
		<a href="member/reg.php" style="text-decoration: none; color: blue; float: right;padding-right: 20px;">
			<p align="right" style="font-size: 20px">Đăng ký </p>
		</a>
	</div>
<?php } ?>