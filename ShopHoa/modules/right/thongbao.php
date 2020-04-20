<?php 
if(session_status()==PHP_SESSION_NONE) session_start();
if (isset($_SESSION['HD'])){ $MaHD = $_SESSION['HD']; ?>
<center style = "margin-top : 150px;"> Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là: <?php echo $MaHD; }?> </center>
<center> Đơn hàng sẽ giao cho bạn trong vòng 3 ngày tới. </center>
<center> Nhấn vào <a href = "../../Index.php"> đây   </a>để quay về trang chủ </center>