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
        
        if(isset($_POST["btnDangKy"])){
            $tentaikhoan = trim(mysqli_real_escape_string($conn,$_POST["txtTenDangNhap"]));
            $matkhau1 = $_POST["txtMatKhau1"];
            $matkhau2 = $_POST["txtMatKhau2"];
            $hoten = $_POST["txtHoTen"];
            $email = $_POST["txtEmail"];
            $diachi = $_POST["txtDiaChi"];
            $dienthoai = $_POST["txtDienThoai"];
            $ngay = $_POST["slNgaySinh"];
            $thang = $_POST["slThangSinh"];
            $nam = $_POST["slNamSinh"];
            
            if(isset($_POST["grpGioiTinh"]))
                $gioitinh = $_POST["grpGioiTinh"];
                
            $loi = "";
			
			$privatekey = "6Lf1ySwUAAAAAIpdgpcijgf2rkYhVT4f50u9a2El";
		
			$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], 
				$_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
			
			if(!$resp->is_valid)
				$loi .= "<li>Mã số an toàn không đúng !</li>";
            
            if($tentaikhoan == "" || $matkhau1 == "" || $matkhau2 == "" || $hoten == "" || $email == "" ||
                $diachi == "" || $dienthoai == "" || !isset($gioitinh))
                $loi .= "<li>Vui lòng nhập đầy đủ thông tin có dấu * </li>";
            
            if($matkhau1 != $matkhau2)
                $loi .= "<li>Vui lòng nhập mật khẩu giống nhau </li>";
    
            if(strlen($matkhau1) <= 5)
                $loi .= "<li>Mật khẩu phải dài hơn 5 kí tự</li>";
        
            if(strpos($email,"@") === false)
                $loi .= "<li>Địa chỉ email không hợp lệ</li>";
            
            if($nam == "0")
                $loi .= "<li>Chưa chọn năm sinh</li>";
    
            if($loi != "")
                echo "<ul>" .$loi. "</ul>";
            else{		
                $sq = "SELECT * FROM khachhang WHERE kh_tendangnhap='$tentaikhoan' OR kh_email='$email'";
                $ketqua = mysqli_query($conn,$sq) or die(mysqli_error($conn));
				$randomcode = md5(rand());
                
                if(mysqli_num_rows($ketqua)==0){		
                    mysqli_query($conn,"INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh,
                        kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd,
                            kh_makichhoat, kh_trangthai, kh_quantri)
                        VALUES ('$tentaikhoan', '".md5($matkhau1)."', '$hoten', $gioitinh, '$diachi', '$dienthoai',
                            '$email', $ngay, $thang, $nam, '', '$randomcode', 0, 0)")
                        or die(mysqli_error($conn));	
						
					$noidungemail = "<p>Chúc mừng bạn <b>$hoten</b> đã đăng ký thành công tài khoản tại website Ducdongho Watches</p>".
							"<p>Vui lòng click vào liên kết để kích hoạt tài khoản:
								<a href='http://localhost/ducdongho/timeplate/index.php?khoatrang=kichhoat&taikhoan=$tentaikhoan&ma=$randomcode'>
								http://localhost/ducdongho/timeplate/kichhoat.php?taikhoan=$tentaikhoan&ma=$randomcode
								</a>
							</p>";
									
					sendGmail("ducdonghoshop@gmail.com","ducdonghoshop123","Ban quản trị website Ducdongho Watches",
						array(array($email,$hoten)),array(array("ducdonghoshop@gmail.com","Ban quản trị website Ducdongho Watches")),
						"Mail kích hoạt tài khoản Ducdongho Watches",$noidungemail);			
											
					echo "<li>Đăng ký thành công, vui lòng kiểm tra lại email</li>";							
                }
                else{
                    echo "<li>Tên đăng nhập hoặc email đã được sử dụng</li>";
                }
            }
        }
    ?>	
	</div>
 
    <div class="container">
        <h2>Đăng ký thành viên</h2>
        <form id="formDangKy" name="formDangKy" method="POST" action="" class="form-horizontal" role="form">
        <div class="form-group">    
            <label for="txtTenDangNhap" class="col-sm-2 control-label">Tên tài khoản(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập"
                   value="<?php if(isset($tentaikhoan)) echo $tentaikhoan ?>"/>
            </div>
        </div>  
        
        <div class="form-group">   
            <label for="txtMatKhau1" class="col-sm-2 control-label">Mật khẩu(*):  </label>
            <div class="col-sm-10">
                  <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control" placeholder="Mật khẩu" value=""/>
            </div>
        </div>     
        
        <div class="form-group"> 
            <label for="txtMatKhau2" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
            <div class="col-sm-10">
                  <input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control" placeholder="Xác nhận mật khẩu" value=""/>
            </div>
        </div>     
        
        <div class="form-group">                               
            <label for="txtHoTen" class="col-sm-2 control-label">Họ tên(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtHoTen" id="txtHoTen" class="form-control" placeholder="Họ tên"
                   value="<?php if(isset($hoten)) echo $hoten ?>"/>
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
             <label for="txtDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtDiaChi" id="txtDiaChi" class="form-control" placeholder="Địa chỉ"
                   value="<?php if(isset($diachi)) echo $diachi ?>"/>
            </div>
        </div>  
        
         <div class="form-group">  
            <label for="txtDienThoai" class="col-sm-2 control-label">Điện thoại(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtDienThoai" id="txtDienThoai" class="form-control" placeholder="Điện thoại"
                   value="<?php if(isset($dienthoai)) echo $dienthoai ?>"/>
            </div>
         </div> 
         
          <div class="form-group">  
            <label for="grpGioiTinh" class="col-sm-2 control-label">Giới tính(*):  </label>
            <div class="col-sm-10">                              
                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="1" id="grpGioiTinh"
                      <?php if(isset($gioitinh) && $gioitinh==1) echo "checked" ?> />Nam</label>
        
                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="0" id="grpGioiTinh"
                      <?php if(isset($gioitinh) && $gioitinh==0) echo "checked" ?> />Nữ</label>
        
            </div>
          </div> 
          
          <div class="form-group"> 
            <label for="slNgaySinh" class="col-sm-2 control-label">Ngày sinh(*):  </label>
            <div class="col-sm-10 input-group">
                <span class="input-group-btn">
                  <select name="slNgaySinh" id="slNgaySinh" class="form-control">
                        <option value='0'>Chọn ngày</option>								
                        <?php
                            $i=1;										
                            for(;$i<=31;$i++)
                             {
                                 if($i==$ngay){
                                     echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                 }
                                 else{
                                 echo "<option value='".$i."'>".$i."</option>";
                                 }
                             } 
                        ?>
                 </select>
                </span>
                <span class="input-group-btn">
                  <select name="slThangSinh" id="slThangSinh" class="form-control">
                    <option value='0'>Chọn tháng</option>					                                 
                    <?php
                        for($i=1;$i<=12;$i++)
                         {
                              if($i==$thang){
                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                             }
                             else{
                             echo "<option value='".$i."'>".$i."</option>";
                             }
                         }
                    ?>
                </select>
                </span>
                <span class="input-group-btn">
                  <select name="slNamSinh" id="slNamSinh" class="form-control">
                    <option value='0'>Chọn năm</option>								                                   
                    <?php
                        for($i=1970;$i<=2010;$i++)
                         {
                             if($i==$nam){
                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                             }
                             else{
                             echo "<option value='".$i."'>".$i."</option>";
                             }
                         }
                    ?>
                </select>
                </span>
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
              <input type="submit"  class="btn btn-primary" name="btnDangKy" id="btnDangKy" value="Đăng ký"/>  
              <input type="button" class="btn btn-primary" name="btnHuy"  id="btnHuy" value="Hủy"
                        onClick="window.location='index.php'" />
            </div>
        </div>
        </form>
    </div>
    