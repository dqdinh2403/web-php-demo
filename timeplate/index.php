<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Ducdongho Watches" />
    
    <title>Ducdongho Watches</title>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="js/jquery-1.11.0.min.js"></script>
   
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
    <script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    
    <!--start-menu-->
    <script src="js/simpleCart.min.js"> </script>
    <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/memenu.js"></script>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
    	
    <!--dropdown-->
    <script src="js/jquery.easydropdown.js"></script>
   
   	<!--Custom-Theme-files-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsive.css">
	<link href="css/main.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
	
</head>

	<!-- phần kết nối db + tạo session giỏ hàng -->
	<?php
		include_once "dbconnect.php";
		session_start();
		if(!isset($_SESSION['giohang'])){
			$_SESSION['giohang'] = array();	
		}
	?>

	<!-- phần xử lý danh mục -->
	<script language="javascript">
		function check(){
			if(<?php 
				if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!="" &&
					isset($_SESSION['quantri']) && $_SESSION['quantri']==1)
					echo 1;
				else
					echo 0;
			?>){
				return true;			
			}
			else{
				alert ('Bạn phải là administrator !');
				return false;
			}
		}
	</script>
    
    <!-- phần xử lý tìm kiếm -->
    <script language="javascript">
		function timkiem(){
			tukhoa=document.getElementById('txtTuKhoa').value;						
			if(tukhoa == ""){
				alert("Nhập từ khóa tìm kiếm !");
				return false;	
			}			
			else{
				window.location = "index.php?khoatrang=timkiem&tukhoa="+tukhoa;
			}
		}
 	</script>
	
    <!-- phần xử lý đăng nhập -->
	<?php 
        if(isset($_POST["btnLogin"])){
            $ten = trim(mysqli_real_escape_string($conn,$_POST["txtTenDangNhap1"]));
            $pass = $_POST["txtMatKhau"];
            
            $loi = "";
            
            if($ten == "")
                $loi .= "Vui lòng nhập tên đăng nhập";
			if($ten == "" && $pass == "")
				$loi .= " và ";	
            if($pass == "")
                $loi .= "Vui lòng nhập mật khẩu";
            
            if($loi != "")
                echo "<script> alert('$loi')</script>";
            else{
				$pass= md5($pass);
				$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE kh_tendangnhap='$ten'
					AND kh_matkhau='$pass' AND kh_trangthai=1") or die(mysqli_error($conn));
												
                if(mysqli_num_rows($result)==1){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['tendangnhap'] = $ten;
					$_SESSION['quantri'] = $row['kh_quantri'];
					echo "<script language='javascript'>window.location='index.php'</script>";			
				}
                else
					echo "<script>alert('Đăng nhập thất bại !')</script>";		
            }
        }
    ?>

	<!-- Modal đăng nhập -->
    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog"> 
          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" align="center" style="color:black;">Đăng Nhập</h4>
            </div>
            <div class="modal-body" style="color:black;">
             <form id="formDangNhap" name="formDangNhap" method="POST" action="">
                <div class="form-group">
                  <label for="txtTenDangNhap1">Tài khoản(*):</label>
                  <input type="text" class="form-control" id="txtTenDangNhap1" name="txtTenDangNhap1" placeholder="Tên đăng nhập"
                  	value="<?php if(isset($_POST['txtTenDangNhap1'])) echo $_POST['txtTenDangNhap1'] ?>">
                </div>
                <div class="form-group">
                  <label for="txtMatKhau">Mật khẩu(*):</label>
                  <input type="password" class="form-control" id="txtMatKhau" name="txtMatKhau" placeholder="Mật khẩu" value="">
                </div>
                <div>
                  <a href="?khoatrang=quenmatkhau" >Quên mật khẩu ?
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary" name="btnLogin" id="btnLogin">Đăng nhập</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                </div>
                </form>              
              </div>
            </div>
        </div>
      </div>

<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">							
                <div class="col-md-6 top-header">               	
				</div> 
                <div class="col-md-6 top-header" style="height: 45px">
                    <ul>
                    	<li><a href="?khoatrang=giohang" class="btn btn-default btn-md" style="color: #fff; background-color: black; border-color: black">
                        	<span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng <span class="badge">
                            	<?php if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0) echo count($_SESSION['giohang'])?>
                            </span>
                        </a></li>
                        <?php
							if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!=""){					
						?>
                        <li><a href="?khoatrang=capnhatkhachhang" class="btn btn-default btn-md"
                        	style="color: #fff; background-color: black; border-color: black">
                        	<span class="glyphicon glyphicon-user"></span>Chào 
							<?php  
								if(strlen($_SESSION['tendangnhap']) > 5)
									echo substr($_SESSION['tendangnhap'],0,5)."...";
								else
									echo $_SESSION['tendangnhap'];
							?>
                        </a></li>
                        <li><a href="?khoatrang=dangxuat" class="btn btn-default btn-md" style="color: #fff; background-color: black; border-color: black">
                        	<span class="glyphicon glyphicon-log-out"></span>Đăng xuất
                        </a></li>
                        <?php
							}
							else{
						?>                      
						<li><a href="?khoatrang=dangky" class="btn btn-default btn-md" style="color: #fff; background-color: black; border-color: black">
                        	<span class="glyphicon glyphicon-pencil"></span>Đăng ký
                        </a></li>																		
                   		<li><button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal"
                        	style="color: #fff; background-color: black; border-color: black">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>Đăng nhập
                        </button></li>  
                        <?php
							}
						?>                  	                   	
                    </ul>                
				</div>            
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="index.php"><h1>Ducdongho Watches</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
                    	<li class="active"><a href="index.php">Trang chủ</a></li>
                        <li class="grid"><a href="#">Giới thiệu</a>
							<div class="mepanel" style="width: 550px">
								<!--<div class="row">-->
									<div class="col1 me-one">
										<ul>
											<li><a href="?khoatrang=gioithieu">Giới thiệu công ty</a></li>
											<li><a href="?khoatrang=lichsu">Lịch sử phát triển</a></li>
                                            <li><a href="?khoatrang=chinhanh">Hệ thống chi nhánh</a></li>
											<li><a href="?khoatrang=huongdanthanhtoan">Hướng dẫn thanh toán</a></li>											
										</ul>
									</div>								
								<!--</div>-->
							</div>
						</li>
						<li class="grid"><a href="#">Nam</a>
							<div class="mepanel" style="width: 550px">
								<!--<div class="row">-->
									<div class="col1 me-one">
										<ul>
											<li><a href="?khoatrang=danhsachsanpham&lspma=1">Adidas</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=2">Citizen</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=3">Daniel Wellington</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=4">Festina</a></li>											
										</ul>
									</div>								
								<!--</div>-->
							</div>
						</li>
						<li class="grid"><a href="#">Nữ</a>
							<div class="mepanel" style="width: 550px">
								<!--<div class="row">-->
									<div class="col1 me-one">
										<ul>
											<li><a href="?khoatrang=danhsachsanpham&lspma=5">Adidas</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=6">Bulova</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=7">Danish Design</a></li>
											<li><a href="?khoatrang=danhsachsanpham&lspma=8">Emporio Armani</a></li>											
										</ul>
									</div>									
								<!--</div>-->
							</div>
						</li>
						<li class="grid"><a href="#">Danh mục</a>
							<div class="mepanel" style="width: 550px">
								<!--<div class="row">-->
									<div class="col1 me-one">
										<ul>                                                                               
											<li><a href="?khoatrang=quanly_loaisanpham" onclick="return check()">Loại sản phẩm</a></li>
											<li><a href="?khoatrang=quanly_sanpham" onclick="return check()">Sản phẩm</a></li>	                                         								
										</ul>
									</div>									
								<!--</div>-->
							</div>
						</li>
						<li class="grid"><a href="?khoatrang=gopy">Góp ý</a>
						</li>
						<li class="grid"><a href="?khoatrang=lienhe">Liên hệ</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">                	  
                    <input type="text" name="txtTuKhoa" id="txtTuKhoa"
                        value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" >
                    <input type="submit" name="btnSearch" id="btnSearch" onclick="timkiem()" value="">                          					
				</div>
			</div>
			<div class="clearfix"> </div>         
			</div> 
            <hr />        
		</div>     
	</div>
	<!--bottom-header-->
    
    <!-- phần nhúng các trang vào index -->
	<?php
		if(isset($_GET['khoatrang'])){
			$khoatrang = $_GET['khoatrang'];
			
			if($khoatrang=="dangky")
				include_once "dangky.php";
			if($khoatrang=="dangxuat")
				include_once "dangxuat.php";
			if($khoatrang=="capnhatkhachhang")
				include_once "capnhatkhachhang.php";
			if($khoatrang=="kichhoat")
				include_once "kichhoat.php";
			if($khoatrang=="quenmatkhau")
				include_once "quenmatkhau.php";
			if($khoatrang=="giohang")
				include_once "giohang.php";
			if($khoatrang=="thanhtoan")
				include_once "thanhtoan.php";
				
			if($khoatrang=="gioithieu")
				include_once "gioithieu.php";
			if($khoatrang=="lichsu")
				include_once "lichsu.php";
			if($khoatrang=="chinhanh")
				include_once "chinhanh.php";
			if($khoatrang=="huongdanthanhtoan")
				include_once "huongdanthanhtoan.php";
			if($khoatrang=="lienhe")
				include_once "lienhe.php";
			if($khoatrang=="gopy")
				include_once "gopy.php";
			if($khoatrang=="timkiem")
				include_once "timkiem.php";	
			if($khoatrang=="danhsachsanpham")
				include_once "danhsachsanpham.php";
			if($khoatrang=="listsanpham")
				include_once "listsanpham.php";
												
			if($khoatrang=="quanly_loaisanpham")
				include_once "quanly_loaisanpham.php";
			if($khoatrang=="quanly_loaisanpham_themmoi")
				include_once "quanly_loaisanpham_themmoi.php";
			if($khoatrang=="quanly_loaisanpham_capnhat")
				include_once "quanly_loaisanpham_capnhat.php";
				
			if($khoatrang=="quanly_sanpham")
				include_once "quanly_sanpham.php";
			if($khoatrang=="quanly_sanpham_themmoi")
				include_once "quanly_sanpham_themmoi.php";
			if($khoatrang=="quanly_sanpham_capnhat")
				include_once "quanly_sanpham_capnhat.php";
			if($khoatrang=="quanly_hinhanhsanpham")
				include_once "quanly_hinhanhsanpham.php";
			if($khoatrang=="quanly_chitietsanpham")
				include_once "quanly_chitietsanpham.php";		
		}
		else
			include_once "noidungindex.php";
	?>
	<!--information-starts-->
    <br /><br /><br />
    
	<div class="information"><hr />
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Theo chúng tôi</h3>
					<ul>
						<li><a href="https://www.facebook.com/"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="https://twitter.com/"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="https://plus.google.com/"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Sản phẩm</h3>
					<ul>
						<li><a href="?khoatrang=listsanpham&ma=1"><p>Sản phẩm mới</p></a></li>
						<li><a href="?khoatrang=listsanpham&ma=2"><p>Sản phẩm bán chạy</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Người dùng</h3>
					<ul>
						<li><a href="?khoatrang=capnhatkhachhang"><p>Thông tin tài khoản</p></a></li>
						<li><a href="?khoatrang=giohang"><p>Thông tin giỏ hàng</p></a></li>						
					</ul>
				</div>
				<div class="col-md-3 infor-left">               
					<h3>Liên hệ &amp; góp ý</h3>                  
					<ul>
                    	<li><a href="?khoatrang=lienhe"><p>Liên hệ</p></a></li>
						<li><a href="?khoatrang=gopy"><p>Góp ý</p></a></li>						
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
                	<p>Đăng ký nhận bản tin tại đây</p>
					<form>
						<input type="text" value="Nhập email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Đăng ký">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2017 Ducdongho Watches. Bản quyền thuộc <a href="http://aptech.cusc.vn/" target="_blank"><font color="#0099FF">CUSC</font></a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->	
</body>
</html>