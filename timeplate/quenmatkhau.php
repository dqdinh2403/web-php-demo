	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/jquery-1.11.0.min.js"/></script>
	<script src="js/jquery.dataTables.min.js"/></script>
	<script src="js/dataTables.bootstrap.min.js"/></script>-->
	
	<script type="text/javascript">
		 var RecaptchaOptions = {
			theme : 'white'
		 };
	</script>

	<div class="container">
	<?php
        include_once "dbconnect.php";
		require_once "recaptchalib.php";
		require_once "sendmailLib.php";
        
        if(isset($_POST["btnDongY"])){
            $tentaikhoan = trim(mysqli_real_escape_string($conn,$_POST["txtTenDangNhap"]));           
            $email = $_POST["txtEmail"];           
               
            $loi = "";
			
			$privatekey = "6Lf1ySwUAAAAAIpdgpcijgf2rkYhVT4f50u9a2El";		
			$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], 
				$_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
			
			if(!$resp->is_valid)
				$loi .= "<li>Mã số an toàn không đúng !</li>";
            
            if($tentaikhoan == "" || $email == "")
                $loi .= "<li>Vui lòng nhập đầy đủ thông tin có dấu * </li>";                     
        
            if(strpos($email,"@") === false)
                $loi .= "<li>Địa chỉ email không hợp lệ</li>";                  
    
            if($loi != "")
                echo "<ul>" .$loi. "</ul>";
            else{		
                $string = "SELECT * FROM khachhang WHERE kh_tendangnhap='$tentaikhoan' AND kh_email='$email'";
                $ketqua = mysqli_query($conn,$string) or die(mysqli_error($conn));
                
                if(mysqli_num_rows($ketqua)==1){
					$newpassword = "DucDongHo".rand();
					mysqli_query($conn,"UPDATE khachhang SET kh_matkhau = '".md5($newpassword)."' WHERE kh_tendangnhap = '$tentaikhoan'")
                        or die(mysqli_error($conn));
					$row = mysqli_fetch_array($ketqua,MYSQLI_ASSOC);
					$hoten = $row['kh_ten'];

					$noidungemail = "<p>Chúc mừng bạn đã lấy lại mật khẩu tài khoản <b>$tentaikhoan</b>
									thành công tại website Ducdongho Watches</p>".
							"<p>Mật khẩu mới của bạn là: <b>$newpassword</b></p>";
									
					sendGmail("ducdonghoshop@gmail.com","ducdonghoshop123","Ban quản trị website Ducdongho Watches",
						array(array($email,$hoten)),array(array("ducdonghoshop@gmail.com","Ban quản trị website Ducdongho Watches")),
						"Mail lấy lại mật khẩu tài khoản Ducdongho Watches",$noidungemail);			
											
					echo "<li>Lấy mật khẩu thành công, vui lòng kiểm tra lại email</li>";							
                }
                else{
                    echo "<li>Tên đăng nhập hoặc email không chính xác</li>";
                }
            }
        }
    ?>
	</div>
 
    <div class="container">
        <h2>Lấy lại mật khẩu</h2>
        <form id="formLayLaiMatKhau" name="formLayLaiMatKhau" method="POST" action="" class="form-horizontal" role="form">
        <div class="form-group">    
            <label for="txtTenDangNhap" class="col-sm-2 control-label">Tên tài khoản(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập"
                   value="<?php if(isset($tentaikhoan)) echo $tentaikhoan ?>"/>
            </div>
        </div>    
        
        <div class="form-group">      
            <label for="txtEmail" class="col-sm-2 control-label">Email(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email"
                   value="<?php if(isset($email)) echo $email ?>"/>
            </div>
        </div>          
        
        <div class="form-group">   
            <label for="lblMaAnToan" class="col-sm-2 control-label">Mã an toàn(*): </label>
            <div class="col-sm-10">
                <?php
                    $publickey = "6Lf1ySwUAAAAAFg4OTRgszmYltzgmD_JoQqiBHQm";
                    echo recaptcha_get_html($publickey);						
                ?>
            </div>
          </div>
        
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <input type="submit"  class="btn btn-primary" name="btnDongY" id="btnDongY" value="Đồng ý"/>  
              <input type="button" class="btn btn-primary" name="btnHuy"  id="btnHuy" value="Hủy"
                        onClick="window.location='index.php'" />
            </div>
        </div>
        </form>
    </div>
    