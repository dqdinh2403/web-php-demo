	<div class="container">
	<?php
		include_once "dbconnect.php";
	
		if(isset($_GET['taikhoan']) && isset($_GET['ma'])){
			$taikhoan = $_GET['taikhoan'];
			$ma = $_GET['ma'];
			$result = mysqli_query($conn, "SELECT * FROM khachhang 
				WHERE kh_tendangnhap='$taikhoan' AND kh_makichhoat='$ma'") or die(mysqli_error($conn));
	
			if(mysqli_num_rows($result) > 0){
				mysqli_query($conn,"UPDATE khachhang SET kh_trangthai=1 WHERE kh_tendangnhap='$taikhoan'");
				echo "Chúc mừng bạn đã kích hoạt tài khoản thành công";
			}
			else
				echo "Mã kích hoạt không đúng";
		}
	?>
	</div>
