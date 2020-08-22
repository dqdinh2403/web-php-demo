	<meta charset="utf-8" />
    <!-- Bootstrap  
    <link rel="stylesheet" type="text/css" href="css/style.css"/>	
	<link rel="stylesheet" href="css/bootstrap.min.css">-->

	<div class="container">
	<?php
        include_once "dbconnect.php";
		
		if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!="" &&
					isset($_SESSION['quantri']) && $_SESSION['quantri']==1){
		
			if(isset($_POST['btnThemMoi'])){
				
				$ten = trim(htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtTen'])));
				$mota = $_POST['txtMoTa'];
				$loi = "";
				
				if($ten=="")
					$loi .= "<li>Vui lòng nhập tên loại sản phẩm</li>";
					
				if($loi!="")
					echo "<ul>$loi</ul>";
				else{
					$sq= "SELECT * FROM loaisanpham WHERE lsp_ten = '$ten'";	
					$result = mysqli_query($conn,$sq) or die(mysqli_error($conn));
					
					if(mysqli_num_rows($result)==0){
						mysqli_query($conn,"INSERT INTO loaisanpham(lsp_ten,lsp_mota) VALUES ('$ten','$mota')") or die(mysqli_error($conn));
						echo '<meta http-equiv="REFRESH" content="0;URL=index.php?khoatrang=quanly_loaisanpham" />';
					}
					else
						echo "<li>Trùng tên loại sản phẩm</li>";
				}		
			} 
		}
		else{
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';	
		}
    ?>
	</div>

    <div class="container">
        <h2>Thêm mới loại sản phẩm</h2>
        <form id="formThemLoaiSanPham" name="formThemLoaiSanPham" method="POST" action="" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
                <div class="col-sm-10">
                    <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm"
                        value='<?php if(isset($ten)) echo $ten ?>'>
                </div>
            </div>
            
            <div class="form-group">
                <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả"
                        value='<?php if(isset($mota)) echo $mota ?>'>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                  <input type="button" class="btn btn-primary" name="btnHuy"  id="btnHuy" value="Hủy"
                        onClick="window.location='index.php?khoatrang=quanly_loaisanpham'" />                  
                </div>
            </div>
        </form>
    </div>