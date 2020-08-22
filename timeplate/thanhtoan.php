	<div class="container">
	<?php
		include_once "dbconnect.php";
		
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		function bindHTTTList($conn){
			$sq = "SELECT httt_ma, httt_ten FROM hinhthucthanhtoan";
			$result = mysqli_query($conn,$sq) or die(mysqli_query($conn));
			echo "<select name='slHTTT'>
			 <option value='0'>Chọn hình thức thanh toán</option>";	
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				echo "<option value='".$row['httt_ma']."'>".$row['httt_ten']."</option>";				
			}
			echo "</select>";
		}
		
		if(isset($_POST['btnCapNhat'])){
			if($_POST['txtNoiGiaoHang'] != "" && $_POST['txtNgayGiaoHang'] != "" && $_POST['slHTTT'] != 0){
				$noigiao = $_POST['txtNoiGiaoHang'];
				$ngaygiao = $_POST['txtNgayGiaoHang'];
				$httt = $_POST['slHTTT'];
				
				$sq = "INSERT INTO dondathang (dh_ngaylap, dh_ngaygiao, dh_noigiao, 
					dh_trangthaithanhtoan, httt_ma, kh_tendangnhap)
						VALUES (now(), $ngaygiao, '$noigiao', 0, $httt, '".$_SESSION['tendangnhap']."')";
				mysqli_query($conn,$sq) or die(mysqli_error($conn));
				
				$dh_ma = mysqli_insert_id($conn);
				
				foreach ($_SESSION['giohang'] as $key => $row){
					$query = "INSERT INTO sanpham_donhang (sp_ma, dh_ma, sp_dh_soluong, sp_dh_dongia)
						VALUES ($key, $dh_ma,".$row['soluong'].",".$row['gia'].")";
					mysqli_query($conn,$query) or die(mysqli_error($conn));
					
					$queryupdatesoluong = "UPDATE sanpham SET sp_soluong = sp_soluong - ".$row['soluong']." WHERE sp_ma =".$key;	
					mysqli_query($conn,$queryupdatesoluong) or die(mysqli_error($conn));
				}
				
				unset($_SESSION['giohang']);
				echo "<script>alert('Chúng tôi đã ghi nhận, đơn hàng của bạn sẽ được giao trong vòng 3 ngày !');</script>";
				echo "<script>window.location='index.php'</script>";			
			}
			else
				echo "Vui lòng nhập đầy đủ thông tin !";		
		}
	?>
	</div>
    
	<div class="container">
        <h2>Thanh toán giỏ hàng</h2>
        <form id="formThanhToanGioHang" class="form-horizontal" name="formThanhToanGioHang" method="POST" action="">         
            <div class="form-group">						    
                <label for="txtNoiGiaoHang" class="col-sm-2 control-label">Nơi giao hàng(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtNoiGiaoHang" id="txtNoiGiaoHang" class="form-control" placeholder="Nơi giao hàng"
                      	value="<?php if(isset($_POST['txtNoiGiaoHang'])) echo $_POST['txtNoiGiaoHang'] ?>"/>
                </div>
           </div>               
           <div class="form-group">     
                <label for="txtNgayGiaoHang" class="col-sm-2 control-label">Ngày giao hàng(*):  </label>
                <div class="col-sm-10">	      
                      <input name="txtNgayGiaoHang" id="txtNgayGiaoHang" type='date' class="form-control" />   
                </div>
           </div>         
           <div class="form-group">           
                <label for="slHTTT" class="col-sm-2 control-label">Hình thức thanh toán(*):  </label>
                <div class="col-sm-10">
                      <?php bindHTTTList($conn); ?>
                </div>
           </div>             
           <div class="form-group">      
           		<div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="btnCapNhat"  class="btn btn-primary" id="btnLobtnCapNhat" value="Cập nhật"/>
                    <input name="btnBoQua" type="button" class="btn btn-primary" id="btnBoQua" value="Bỏ qua"
                    	onClick="window.location='index.php?khoatrang=giohang'" />
                </div>
           </div>   
        </form>
	</div>
	
