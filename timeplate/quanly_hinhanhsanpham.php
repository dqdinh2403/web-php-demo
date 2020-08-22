	<meta charset="utf-8" />
    <!-- Bootstrap  
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    
	<script language="javascript">
        function deleteConfirm(tenhsp,tensp){
            if(confirm("Bạn có chắc chắn muốn xóa hình " + tenhsp + " của sản phẩm " + tensp)){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    
	<?php
		include_once "dbconnect.php";
		
		if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!="" &&
					isset($_SESSION['quantri']) && $_SESSION['quantri']==1){
		
			if(isset($_GET['ma'])){
				$sp_ma = $_GET['ma'];
				$sql = "SELECT sp_ten FROM sanpham WHERE sp_ma=$sp_ma";
				$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				$row = mysqli_fetch_row($rs);
				$sp_ten = $row[0];
			}
			else
				echo '<meta http-equiv="refresh" content="0;URL=index.php?khoatrang=quanly_sanpham" />';
				
			if(isset($_GET['mahinh'])){
				$mahinh = $_GET['mahinh'];
				$ketqua = mysqli_query($conn, "SELECT * FROM hinhsanpham WHERE hsp_ma='$mahinh'") or die(mysqli_error($conn));
				$row = mysqli_fetch_array($ketqua, MYSQLI_ASSOC);
				$filecanxoa = $row['hsp_tentaptin'];		
				$sp_ma = $row['sp_ma'];
				unlink("products/".$filecanxoa);
				mysqli_query($conn, "DELETE FROM hinhsanpham WHERE hsp_ma='$mahinh'") or die(mysqli_error($conn));
				echo '<meta http-equiv="refresh" content="0;URL=index.php?khoatrang=quanly_hinhanhsanpham&ma='.$sp_ma.'" />';
			}
				
			if(isset($_POST['btnLuu'])){
				$sp_ma = $_POST['txtMa'];
				$taptin = $_FILES['fileHinhAnh'];
				
				if($taptin['type']=="image/jpg" || $taptin['type']=="image/jpeg" || $taptin['type']=="image/png"
					|| $taptin['type']=="image/gif"){
					if($taptin['size'] <= 614400){
						$tentaptin = $sp_ma."_".$taptin['name'];
						copy($taptin['tmp_name'],"products/".$tentaptin);
						$sql = "INSERT INTO hinhsanpham (hsp_tentaptin, sp_ma) VALUES ('$tentaptin','$sp_ma')";
						$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						
						if($rs)
							echo "<script> alert('Upload thành công') </script>";
						else{
							echo "<script> alert('Upload không thành công') </script>";
						}
					}
					else
						echo "<script> alert('Hình có kích thước vượt quá 600kb') </script>";
				}
				else
					echo "<script> alert('Hình không đúng định dạng') </script>";
			}  
		}
		else{
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}		
    ?>
    
    
    <div class="container">
		<h2>Quản lý hình ảnh sản phẩm</h2>
        <form id="formQuanLyHinhAnhSanPham" class="form-horizontal" name="formQuanLyHinhAnhSanPham"
        	method="POST" action="" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <label for="txtMa" class="col-sm-2 control-label">Mã sản phẩm(*):  </label>
                <div class="col-sm-10">
                    <input type="text" name="txtMa" id="txtMa" class="form-control" placeholder="Mã sản phẩm" value='<?php echo $sp_ma ?>' readonly/>
            	</div>
            </div>	
            <div class="form-group">    
                <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
                <div class="col-sm-10">
                     <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên sản phẩm" value='<?php echo $sp_ten  ?>' readonly/> 
                </div>
            </div>    
             <div class="form-group">    
                <label for="" class="col-sm-2 control-label">Hình ảnh(*):  </label>
                <div class="col-sm-10">
                    <input type="file" name="fileHinhAnh" id="fileHinhAnh" class="form-control"/>
                    <input type="submit"  class="btn btn-primary" name="btnLuu" id="btnLuu" value="Lưu hình ảnh"/>        
                </div>
             </div>       

            <!--Danh sach hinh anh-->
             <div class="col-sm-offset-2 col-sm-10">
                <div class="col-sm-2">
                    <label class="control-label">STT</label>
                </div>
                <div class="col-sm-3">
                    <label class="control-label">Hình ảnh</label>
                </div>
                <div class="col-sm-2">
                    <label class="control-label">Xóa</label>
                </div>
            </div> <!-- <div class="col-sm-offset-2 col-sm-12">1 hang bang hinh anh-->
           <!--Row du lieu-->
           <?php
                $sql = "SELECT hsp_ma, hsp_tentaptin FROM hinhsanpham WHERE sp_ma=$sp_ma";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $stt = 1;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
                <div class='col-sm-offset-2 col-sm-10'>
                  <div class='col-sm-2'>
                    <?php echo $stt ?>
                    </div>
                  <div class='col-sm-3'>
                    <img src="products/<?php echo $row['hsp_tentaptin'] ?>" width="100px"/>
                  </div>
                  <div class='col-sm-2'>
                      <a onclick="return deleteConfirm('<?php echo $row['hsp_tentaptin'] ?>','<?php echo $sp_ten ?>')" 
                      href="index.php?khoatrang=quanly_hinhanhsanpham&mahinh=<?php echo $row['hsp_ma'] ?>">
                      <img src='images/delete.png' border='0' /></a>
                  </div>                 
                </div>
                <div class='col-sm-offset-2 col-sm-4'>
                    <div><hr /></div>
               </div>
		  <?php
            $stt++;
                }
          ?>
        <!-- <div class="form-group"> -Danh sach hinh anh-->

           <div class="col-sm-offset-3 col-sm-12">
                <div class="col-sm-2">
                     <a class="btn btn-primary" href="index.php?khoatrang=quanly_sanpham"> Đóng</a>
                </div>
            </div>
            
        </form>
    </div><!--<div class="container">-->
