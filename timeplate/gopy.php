	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/jquery-1.11.0.min.js"/></script>
	<script src="js/jquery.dataTables.min.js"/></script>
	<script src="js/dataTables.bootstrap.min.js"/></script>-->
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		 var RecaptchaOptions = {
			theme : 'white'
		 };
	</script>

	<div class="container">
	<?php
        include_once "dbconnect.php";
        
        if(isset($_POST["btnGopy"])){
            $hoten = $_POST["txtHoTen"];
            $tieude = $_POST["txtTieude"];
            $noidung = $_POST["txtNoidung"];
            $chude = $_POST["slChude"];  
            $loi = "";
            
           if($hoten == "" || $tieude == "" || $noidung == "" )
                $loi .= "<li>Vui lòng nhập đầy đủ thông tin có dấu * </li>";
    
           if($loi != "")
		   		echo $loi;		                   		            
		   else{
				mysqli_query($conn,"INSERT INTO gopy (gy_hoten,gy_tieude,gy_noidung,gy_ngaygopy,cdgy_ma )
                        VALUES ('".$hoten."', '".$tieude."', '".$noidung."','".date('Y-m-d H:i:s')."', $chude)")
                        or die(mysqli_error($conn));					
                echo "<li>Chúng tôi sẽ ghi nhận lại sự góp ý của bạn, xin chân thành cảm ơn !</li>";
			}
		}				
     ?>
	 </div>

    <div class="container">
        <h2>Góp ý</h2>
        <form id="formGopy" name="formGopy" method="POST" action="" class="form-horizontal" role="form">
        
        <div class="form-group"> 
            <label for="slChude" class="col-sm-2 control-label">Chủ đề góp ý(*):  </label>
            <div class="col-sm-10 input-group">
                <span class="input-group-btn">
                  <select name="slChude" id="slChude" class="form-control">
                        <option value='0'>Chọn chủ đề</option>								
                        <?php
							$result = mysqli_query($conn,"SELECT * FROM chudegopy") or die(mysqli_error($conn));
						 		while ($row= mysqli_fetch_row($result)){
                                     echo "<option value='".$row[0]."' >".$row[1]."</option>";
								}
                        ?>
                 </select>
                </span>
              
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
            <label for="txtTieude" class="col-sm-2 control-label">Tiêu đề(*):  </label>
            <div class="col-sm-10">
                  <input type="text" name="txtTieude" id="txtTieude" class="form-control" placeholder="Tiêu đề"
                   value="<?php if(isset($tieude)) echo $tieude ?>"/>
            </div>
        </div>  
        
        <div class="form-group">   
             <label for="txtNoidung" class="col-sm-2 control-label">Nội dung(*):  </label>
            <div class="col-sm-10">
                 <textarea name="txtNoidung" rows="4" class="ckeditor"><?php if(isset($noidung)) echo $noidung ?></textarea>
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
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <input type="submit"  class="btn btn-primary" name="btnGopy" id="btnGopy" value="Góp ý"/>  
              <input type="button" class="btn btn-primary" name="btnHuy"  id="btnHuy" value="Hủy"
                        onClick="window.location='index.php'" />
            </div>
        </div>
        </form>
    </div>
    