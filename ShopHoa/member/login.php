<?php
if (isset($_POST['submit'])) {
	$UN = $_POST['Username'];
	$passw = $_POST['pass'];
	include('../admin/config.php');
	$sql = "SELECT * FROM  `thanhvien` WHERE `UserName` = '$UN' and `Password` = '$passw'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			session_start();
			$_SESSION['login'] = $row['ID'];
			if (isset($_SESSION['cart_t'])) {
				header('location: ../Index.php?view=cart');
			} else {
				header('location: ../Index.php');
			}
		} else {
			echo "Sai tên đăng nhập hoặc mật khẩu";
		}
	}
}

?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body class="bgr_body">
	<div class="my-container">
		<div class="wrapper-form">

			<form action="login.php" method="post" enctype="multipart/form-data">
				<div class="text-header text-center">
					<h2>ĐĂNG NHẬP</h2>
					<br>
				</div>
				<div class="my-form-group">
					<label class="my-control" for="username"><b>Tài khoản:</b></label>
					<input class="my-control" type="text" id="username" name="Username">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="pass"><b>Mật khẩu:</b></label>
					<input class="my-control" type="password" id="pass" name="pass">
				</div>


				<div class="my-form-group text-center">
					<input type="submit" name="submit" value="Đăng nhập" id="submit">
					<a href="../Index.php">
						<h4 class="comeback_home">Trang chủ</h4>
					</a>
				</div>
			</form>
		</div>
	</div>

</body>

</html>