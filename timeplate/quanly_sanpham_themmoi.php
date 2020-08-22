    <!-- Bootstrap 
    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    
	<div class="container">
   	<?php
		include_once "dbconnect.php";
		
		function bindLSPList ($conn){
			$sqlstring = "SELECT lsp_ma, lsp_ten FROM loaisanpham";		
			$result = mysqli_query($conn,$sqlstring) or die(mysqli_error($conn));
			
			echo "<select name='slLoaiSanPham'>
					<option value='0'>Chọn loại sản phẩm</option>";
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					if($row['lsp_ma'] == $_POST['slLoaiSanPham']){
						echo "<option value='".$row['lsp_ma']."' selected='selected'>".$row['lsp_ten']."</option>";	
					}
					else
						echo "<option value='".$row['lsp_ma']."'>".$row['lsp_ten']."</option>";
				}
			echo "</select>";
		}
		
		function bindNSXList ($conn){
			$sqlstring = "SELECT nsx_ma, nsx_ten FROM nhasanxuat";
			$result = mysqli_query($conn,$sqlstring) or die(mysqli_error($conn));
			
			echo "<select name='slNhaSanXuat'>
					<option value='0'>Chọn nhà sản xuất</option>";
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					if($row['nsx_ma'] == $_POST['slNhaSanXuat']){
						echo "<option value='".$row['nsx_ma']."' selected='selected'>".$row['nsx_ten']."</option>";
					}
					else
						echo "<option value='".$row['nsx_ma']."'>".$row['nsx_ten']."</option>";
				}
			echo "</select>";
		}
		
		date_default_timezone_set("Asia/Bangkok");
		
		if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!="" &&
					isset($_SESSION['quantri']) && $_SESSION['quantri']==1){
		
			if(isset($_POST['btnThemMoi'])){
				$ten = trim(htmlspecialchars(mysqli_real_escape_string($conn,$_POST['txtTen'])));
				$loai = $_POST['slLoaiSanPham'];
				$nsx = $_POST['slNhaSanXuat'];
				$gia = $_POST['txtGia'];
				$motangan = $_POST['txtMoTaNgan'];
				$motachitiet = $_POST['txtMoTaChiTiet'];
				$soluong = $_POST['txtSoLuong'];
				
				$loi = "";
				
				if($ten=="")
					$loi .= "<li>Vui lòng nhập tên sản phẩm</li>";
				if($loai==0)
					$loi .= "<li>Vui lòng nhập loại sản phẩm</li>";
				if($nsx==0)
					$loi .= "<li>Vui lòng nhập nhà sản xuất</li>";
				if(!is_numeric($gia))
					$loi .= "<li>Vui lòng nhập giá</li>";
				if($motangan=="")
					$loi .= "<li>Vui lòng nhập mô tả ngắn sản phẩm</li>";
				if($motachitiet=="")
					$loi .= "<li>Vui lòng nhập mô tả chi tiết sản phẩm</li>";
				if(!is_numeric($soluong))
					$loi .= "<li>Vui lòng nhập số lượng của sản phẩm</li>";
					
				if($loi!="")
					echo "<ul>$loi</ul>";
				else{
					$test = "SELECT * FROM sanpham WHERE sp_ten = '$ten'";
					$result = mysqli_query($conn,$test) or die(mysqli_error($conn));
					
					if(mysqli_num_rows($result)==0){
						$sq = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota_ngan, sp_mota_chitiet, sp_soluong,
						 lsp_ma, nsx_ma, sp_ngaycapnhat)
							VALUES ('".$ten."',".$gia.",'".$motangan."','".$motachitiet."',".$soluong.",
								".$loai.",".$nsx.",'".date('Y-m-d H:i:s')."')";	
						mysqli_query($conn,$sq) or die(mysqli_error($conn));
						echo '<meta http-equiv="REFRESH" content="0;URL=index.php?khoatrang=quanly_sanpham" />';						
					}
					else
						echo "<li>Trùng tên sản phẩm</li>";
				}
			}
		}
		else{
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
	?>      
	</div>
    
    <div class="container">
    	<h2>Thêm mới sản phẩm</h2>
        <form id="formThemSanPham" name="formThemSanPham" method="POST" action="" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
                    <div class="col-sm-10">
                          <input type="text" name="txtTen" id="txtTen" class="form-control"
                            placeholder="Tên sản phẩm" value="<?php if(isset($ten)) echo $ten ?>"/>
                    </div>
            </div>   
          <div class="form-group">   
                 <label for="slLoaiSanPham" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
                <div class="col-sm-10">
                      <?php bindLSPList($conn) ?>
                </div>
           </div>                      
            <div class="form-group">   
                <label for="slNhaSanXuat" class="col-sm-2 control-label">Hãng sản xuất(*):  </label>
                <div class="col-sm-10">
                      <?php bindNSXList($conn) ?>
                </div>
            </div>   
                          
          <div class="form-group">  
                <label for="txtGia" class="col-sm-2 control-label">Giá(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtGia" id="txtGia" class="form-control"
                        placeholder="Giá" value="<?php if(isset($gia)) echo $gia ?>"/>
                </div>
            </div>   
                            
            <div class="form-group">   
                <label for="txtMoTaNgan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control"
                        placeholder="Mô tả ngắn" value="<?php if(isset($motangan)) echo $motangan ?>"/>
                </div>
            </div>
                            
             <div class="form-group">  
                <label for="txtMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
                <div class="col-sm-10">
                      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"><?php if(isset($motachitiet)) echo $motachitiet ?></textarea>
                        <script language="javascript">
                            CKEDITOR.replace( 'txtMoTaChiTiet',
                            {
                                skin : 'kama',
                                extraPlugins : 'uicolor',
                                uiColor: '#eeeeee',
                                toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                    ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                    ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                    ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                    ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                    ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                    ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                    ['Style','FontFormat','FontName','FontSize'],
                                    ['TextColor','BGColor'],[ 'UIColor' ] ]
                            });                     
                        </script>                     
                </div>
             </div>                          
            <div class="form-group">  
                <label for="txtSoLuong" class="col-sm-2 control-label">Số lượng(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" class="form-control"
                        placeholder="Số lượng" value="<?php if(isset($soluong)) echo $soluong ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                      <input type="button" class="btn btn-primary" name="btnHuy" id="btnHuy"
                        value="Hủy" onclick="window.location='index.php?khoatrang=quanly_sanpham'" />                     
                </div>
            </div>
        </form>
    </div>
