	<div class="container">	
	<?php
		include_once "dbconnect.php";
		
		// ham kiem tra du lieu
		function KiemTra(){
			if($_POST['txtHoTen'] == "" || $_POST['txtDiaChi'] == "" || $_POST['txtDienThoai'] == "")	
				return "<p>Vui lòng nhập đầy đủ thông tin !</p>";
			elseif($_POST['txtMatKhau1'] != $_POST['txtMatKhau2'])
				return "<p>Vui lòng nhập 2 mật khẩu giống nhau !</p>";
			elseif(strlen($_POST['txtMatKhau1'])<=5 && strlen($_POST['txtMatKhau1'])>0)
				return "<p>Mật khẩu phải lớn hơn 5 kí tự !</p>";
			else
				return "";
		}
				
		// code nhan dua lieu tu csdl de hien thi
		$query = "SELECT kh_email, kh_ten, kh_diachi, kh_dienthoai FROM khachhang 
			WHERE kh_tendangnhap = '".$_SESSION['tendangnhap']. "'";
	
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$tendangnhap = $_SESSION['tendangnhap'];
		$email = $row['kh_email'];
		$hoten = $row['kh_ten'];
		$diachi = $row['kh_diachi'];
		$dienthoai = $row['kh_dienthoai'];
	
		// code khi nhan nut cap nhat
		if(isset($_POST['btnCapNhat'])){
			if($_POST['txtMatKhau1']!="")
				$matkhau = $_POST['txtMatKhau1'];			
			$hoten = $_POST['txtHoTen'];
			$diachi = $_POST['txtDiaChi'];
			$dienthoai = $_POST['txtDienThoai'];
	
			$kiemtra = KiemTra();
			if($kiemtra == ""){
				if($_POST['txtMatKhau1']!=""){
					mysqli_query($conn, "UPDATE khachhang SET kh_ten = '$hoten', kh_diachi = '$diachi',
						kh_dienthoai = '$dienthoai', kh_matkhau = '".md5($matkhau)."'
							WHERE kh_tendangnhap = '".$_SESSION['tendangnhap']. "'")
					or die(mysqli_error($conn));					
				}
				else{
					mysqli_query($conn, "UPDATE khachhang SET kh_ten = '$hoten', kh_diachi = '$diachi',
						kh_dienthoai = '$dienthoai' WHERE kh_tendangnhap = '".$_SESSION['tendangnhap']. "'")
					or die(mysqli_error($conn));				
				}
				echo "<script>alert('Cập nhật thành công !'); window.location='index.php'</script>";
			}
			else
				echo $kiemtra;
		}
	?>
	</div>
    	
	<div class="container">	
		<h2>Cập nhật thông tin cá nhân</h2>	
        <form id="formCapNhatThongTinKhachHang" name="formCapNhatThongTinKhachHang" method="POST" action="" class="form-horizontal" role="form">
            <div class="form-group">	    
              <label for="lblTenDangNhap" class="col-sm-2 control-label">Tên đăng nhập(*):  </label>
                <div class="col-sm-10">
                  <label class="form-control" style="font-weight:400"><?php echo $tendangnhap ?></label>
                 </div>
             </div>                
             <div class="form-group">   
                <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
                <div class="col-sm-10">
                       <label class="form-control" style="font-weight:400"><?php echo $email ?></label>
                </div>
              </div>                   
               <div class="form-group"> 
                    <label for="txtMatKhau1" class="col-sm-2 control-label">Mật khẩu(*):  </label>
                    <div class="col-sm-10">
                          <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control"/>
                    </div>
                </div>
                    
                 <div class="form-group"> 
                    <label for="txtMatKhau2" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
                    <div class="col-sm-10">
                          <input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control"/>
                    </div>
                </div>
                    
                <div class="form-group">                         
                    <label for="txtHoTen" class="col-sm-2 control-label">Họ tên(*):  </label>
                    <div class="col-sm-10">
                          <input type="text" name="txtHoTen" id="txtHoTen" value="<?php echo $hoten ?>" class="form-control" placeholder="Họ tên"/>
                    </div>
                </div>
                   
                 <div class="form-group"> 
                     <label for="txtDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
                    <div class="col-sm-10">
                          <input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php echo $diachi ?>" class="form-control" placeholder="Địa chỉ"/>
                    </div>
                </div>
                    
                <div class="form-group"> 
                    <label for="txtDienThoai" class="col-sm-2 control-label">Điện thoại(*):  </label>
                    <div class="col-sm-10">
                          <input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php echo $dienthoai ?>"
                          	class="form-control" placeholder="Điện thoại" />
                    </div>
                </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                      <input type="button" class="btn btn-primary" name="btnHuy"  id="btnHuy" value="Hủy"
                        	onClick="window.location='index.php'" /> 
                </div>
            </div>
        </form>
	</div>
