	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)
    <script src="js/jquery-1.11.0.min.js"></script>-->
    <!--Custom-Theme-files-->
    <!--theme-style
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->	

	<!--<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>-->
    
    <!--start-menu
    <script src="js/simpleCart.min.js"> </script>
    <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/memenu.js"></script>-->

	<!--<script>$(document).ready(function(){$(".memenu").memenu();});</script>-->
    
    <!--dropdown<script src="js/jquery.easydropdown.js"></script>-->	
    
	<script type="text/javascript">
        $(function() {
        
            var menu_ul = $('.menu_drop > li > ul'),
                   menu_a  = $('.menu_drop > li > a');
            
            menu_ul.hide();
        
            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });
        
        });
    </script>		

	<?php
        include_once "dbconnect.php";
    
        if(isset($_GET['ma'])){			
            $ma = $_GET['ma'];		
            $sanpham = mysqli_query($conn, "SELECT a.sp_ma, a.sp_ten, a.sp_gia, a.sp_giacu, a.sp_ngaycapnhat,
                a.sp_soluong, b.lsp_ten, c.nsx_ten, a.sp_mota_chitiet				
                FROM sanpham a JOIN loaisanpham b ON a.lsp_ma=b.lsp_ma JOIN nhasanxuat c ON a.nsx_ma=c.nsx_ma
                WHERE sp_ma=".$ma) or die (mysqli_error($conn));
                
            while($row = mysqli_fetch_array($sanpham,MYSQLI_ASSOC)){	
                $ten = $row['sp_ten'];
                $loai = $row['lsp_ten'];
                $nsx = $row['nsx_ten'];
                $gia = $row['sp_gia'];
                $giacu = $row['sp_giacu'];
                $motachitiet = $row['sp_mota_chitiet'];
                $soluong = $row['sp_soluong'];
                $ngaydang = date_create($row['sp_ngaycapnhat']);	
            }	
            
            $hinh = mysqli_query($conn, "SELECT hsp_tentaptin FROM hinhsanpham WHERE sp_ma=".$ma) or die (mysql_error($conn));
			
			if(isset($_POST['txtDatHang'])){
				if(is_numeric($_POST['txtDatHang'])){
					$sqsoluongconlai = mysqli_query($conn,"SELECT sp_soluong FROM sanpham WHERE sp_ma=$ma") or die(mysqli_error($conn));
					$soluongconlai = mysqli_fetch_row($sqsoluongconlai);
					if($soluongconlai[0] >= $_POST['txtDatHang']){
						$coroi = false;
						foreach ($_SESSION['giohang'] as $key => $row){
							if($key == $ma){
								$_SESSION['giohang'][$key]['soluong'] += $_POST['txtDatHang'];
								$coroi = true;
							}
						}
						if(!$coroi){
							$dathang = array (
								"ten" => $ten,
								"gia" => $gia,
								"soluong" => $_POST['txtDatHang'],
								"hang" => $nsx);
							$_SESSION['giohang'][$ma] = $dathang;
						}
						
						echo "<script language='javascript'>
								alert('Sản phẩm đã được thêm vào giỏ hàng, truy cập giỏ hàng để xem !');
								window.location = window.location;				
							</script>";	
					}
					else
						echo "<script>alert('Số lượng đặt hàng vượt quá số lượng kho !'); </script>";
				}
				else
					echo "<script>alert('Số lượng không hợp lệ !'); </script>";
			}		
        }
		else
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    ?>


	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">       	
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							  <ul class="slides">
                              	<?php
								if(mysqli_num_rows($hinh) == 0){
									echo "<li data-thumb='products/no_image.gif'>
											<div class='thumb-image'>
												<img src='products/no_image.gif' data-imagezoom='true' class='img-responsive' alt=''/>
											</div>
										</li>";
								}
								else{
									while($hinhs = mysqli_fetch_array($hinh, MYSQLI_ASSOC)){										
										echo "<li data-thumb='products/".$hinhs['hsp_tentaptin']."'>
											<div class='thumb-image'>
												<img src='products/".$hinhs['hsp_tentaptin']."' data-imagezoom='true' class='img-responsive' alt=''/>
											</div>
										</li>";
									 }	
								}				
								?>                            								
							  </ul>
						</div>
						<!-- FlexSlider -->
						<script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
                            <h2><?php echo $ten ?></h2>		
                            <h5 class="item_price"><?php echo number_format($gia,0,',','.') ?> VNĐ 
                            (<font style="text-decoration:line-through; font-size:20px"><?php echo number_format($giacu,0,',','.') ?> VNĐ</font>)
                            </h5>
                            <p><strong>Nhà sản xuất</strong>: <?php echo $nsx ?></p> 
                            <p><strong>Loại sản phẩm</strong>: <?php echo $loai ?></p>
                            <p><strong>Chi tiết</strong>: <?php echo $motachitiet ?></p>  
                            <p><strong>Ngày cập nhật</strong>: <?php echo date_format($ngaydang,'d/m/Y') ?></p>
                            <p><strong>Số lượng</strong>: <?php echo $soluong ?></p>                       
							                                  
                            <form name="formDatHang" id="formDatHang" method="POST" action="">
                                <input type="input" name="txtDatHang" id="txtDatHang" value="1" 
                                size="3" style="text-align:center;" maxlength="3"/>
                                <input type="image" src="images/datmua.gif" name="btnDatHang" id="btnDatHang"
                                width="60" height="21" align="absmiddle">                              
                            </form>                                      
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>		
				<div class="col-md-3 single-right"> </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->     
    