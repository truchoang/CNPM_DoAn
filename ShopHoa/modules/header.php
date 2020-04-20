<div class="header">

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
			<a class="btn_logout" href="Index.php?action=logout">Logout</a>
			<p class="info">Xin chào,&nbsp; <?php echo $row['HoTen']; ?></p>
		</div>
	<?php
				} else { ?>
		<div id="head">
			<a href="member/login.php" >
				<p>Đăng nhập</p>
			</a>
			<p style="margin-right: 20px"></p>
			<a href="member/reg.php">
				<p >Đăng ký </p>
			</a>
		</div>
	<?php } ?>
</div>