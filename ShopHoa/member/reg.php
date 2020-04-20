<html>

<head>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<?php
if (isset($_POST['submit'])) {
	$UN = $_POST['Username'];
	$name = $_POST['HoTen'];
	$sex = $_POST['Gioitinh'];
	$date = $_POST['Namsinh'];
	$passw = $_POST['pass'];
	$place = $_POST['Diachi'];
	$mail = $_POST['email'];
	$sdt = $_POST['sdt'];
	include('../admin/config.php');
	$sql = "SELECT * FROM  thanhvien WHERE UserName = '$UN'";
	$query = mysqli_query($conn, $sql);
	if ($query) if (mysqli_num_rows($query) > 0) {
		echo 'Username đã có người sử dụng';
	} elseif (strcmp($_POST['pass'], $_POST['repass']) != 0) {
		echo 'Mật khẩu nhập lại không chính xác.';
	} else {
		$sql = "SELECT * FROM  thanhvien WHERE Email = '$mail'";
		$query = mysqli_query($conn, $sql);
		if ($query) if (mysqli_num_rows($query) > 0) {
			echo "Email đã có người sử dụng";
		} else {
			$sql = "SELECT * FROM  thanhvien WHERE SDT = '$sdt'";
			$query = mysqli_query($conn, $sql);
			if ($query) if (mysqli_num_rows($query) > 0) {
				echo "Số điện thoại đã được đăng ký";
			} else {
				$sql  = "INSERT INTO `thanhvien`(`UserName`, `HoTen`, `Password`, `DiaChi`, `SDT`, `NgaySinh`, `GioiTinh`, `Email`) VALUES ('$UN','$name','$passw','$place','$sdt','$date','$sex','$mail')";
				$query = mysqli_query($conn, $sql);
?>
				<p class="txt_dky_thanhcong">Đăng ký thành viên thành công. Nhấn Home để quay lại đăng nhập </p>
<?php
			}
		}
	}
}
?>



<body class="bgr_body2">

	<div class="my-container">
		<div class="wrapper-form">

			<form action="reg.php" method="post" enctype="multipart/form-data">
				<div class="text-header text-center">
					<h2> Đăng ký thành viên</h2>

				</div>
				<div class="my-form-group">
					<label class="my-control" for="username"><b>Username:</b></label>
					<input class="my-control" type="text" id="username" name="Username">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="hoten"><b>Họ tên:</b></label>
					<input class="my-control" type="text" id="hoten" name="HoTen">
				</div>
				<div class="my-form-group radio">
					<label class="my-control"><b>Giới tính:</b></label>

					<label for="nam">
						Nam
						<input id="nam" type="radio" name="Gioitinh" value="Nam">
					</label>
					<label for="nu">
						Nữ
						<input id="nu" type="radio" name="Gioitinh" value="Nữ">
					</label>
					<label for="khac">
						Khác
						<input id="khac" type="radio" name="Gioitinh" value="Khác">
					</label>
				</div>
				<div class="my-form-group">
					<label class="my-control" for="naminh"><b>Năm sinh:</b></label>
					<input class="my-control" type="date" id="naminh" name="Namsinh">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="pass"><b>Mật khẩu</b></label>
					<input class="my-control" type="password" id="pass" name="pass">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="repass"><b>Nhập lại mật khẩu</b></label>
					<input class="my-control" type="password" id="repass" name="repass">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="address"><b>Địa chỉ</b></label>
					<input class="my-control" type="text" id="address" name="Diachi">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="email"><b>Email</b></label>
					<input class="my-control" type="email" id="email" name="email">
				</div>
				<div class="my-form-group">
					<label class="my-control" for="phone"><b>Phone</b></label>
					<input class="my-control" type="text" id="phone" name="sdt">
				</div>
				<div class="my-form-group text-center">
					<input type="submit" name="submit" value="Đăng ký" id="submit">
					<a href="../Index.php">
						<h4 class="comeback_home">Trang chủ</h4>
					</a>
				</div>

			</form>
		</div>
	</div>

</body>

</html>