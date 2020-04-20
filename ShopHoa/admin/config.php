<?php
$hostname ="localhost";
$username ="root";
$pass ="";
$database ="tandn";
$conn = mysqli_connect($hostname,$username,$pass,$database) or die ("Không kết nối được với cơ sở dữ liệu.");
mysqli_query($conn,"SET NAMES 'UTF8'");
?> 