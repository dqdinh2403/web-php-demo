	<meta charset="utf-8" />
    <!-- Bootstrap 
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">-->
    
    <!-- phân trang 
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>-->
    
    <script language="javascript">
		$(document).ready(function() {
			var table = $('#tableSanPham').DataTable( {
				responsive: true,
				"language": {
					"lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang", 
					"info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
					"infoEmpty": "Dữ liệu rỗng",
					"emptyTable": "Chưa có dữ liệu nào",
					"processing": "Đang xử lý...",
					"search": "Tìm kiếm:",
					"loadingRecords": "Đang load dữ liệu...",
					"zeroRecords": "Không tìm thấy dữ liệu",
					"infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
					"paginate":{
						"first": "|<",
						"last": ">|",
						"next": ">>",
						"previous": "<<"
					}
				},
				"lengthMenu": [[2,5,10,15,20,25,30,-1],[2,5,10,15,20,25,30,"Tất cả"]]
			});
			new $.fn.dataTable.FexidHeader(table);
		});	
    </script>
    
    <script language="javascript">
		function deleteConfirm1(spten){
			if(confirm("Bạn có chắc chắn muốn xóa sản phẩm " + spten)){
				return true;	
			}
			else
				return false;
		}   
		function deleteConfirm2(){		
			if(confirm("Bạn có chắc chắn muốn xóa những sản phẩm đã đánh dấu")){
				return true;
			}
			else{
				return false;
			}
		}	   
    </script>
    
    <?php
		include_once 'dbconnect.php';
		
		if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!="" &&
					isset($_SESSION['quantri']) && $_SESSION['quantri']==1){
		
			if(isset($_POST['btnXoa']) && isset($_POST['checkbox'])){
				for($i=0; $i<count($_POST['checkbox']); $i++){
					$masanpham = $_POST['checkbox'][$i];
					mysqli_query($conn,"DELETE FROM sanpham WHERE sp_ma = $masanpham") or die(mysqli_eror($conn));
				}
			}
			
			if(isset($_GET['ma'])){
				$masanpham = $_GET['ma'];
				
				mysqli_query($conn, "DELETE FROM sanpham WHERE sp_ma=$masanpham") or die(mysqli_error($conn));
				echo '<meta http-equiv="refresh" content="0;URL=index.php?khoatrang=quanly_sanpham">';	
			}
		}
		else{
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
	?>

	<div class="container">
		<form name="formQuanLySanPham" id="formQuanLySanPham" method="POST" action="">
			<h2>Quản lý sản phẩm</h2>
			<p>
				<a href="index.php?khoatrang=quanly_sanpham_themmoi"><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
			</p>
			<table id="tableSanPham" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width:5%"><strong>Chọn</strong></th>
						<th style="width:10%"><strong>Mã sản phẩm</strong></th>
						<th style="width:20%"><strong>Tên sản phẩm</strong></th>
						<th style="width:10%"><strong>Giá</strong></th>
						<th style="width:10%"><strong>Số lượng</strong></th>
						<th style="width:15%"><strong>Loại sản phẩm</strong></th>
						<th style="width:10%"><strong>Nhà sản xuất</strong></th>
						<th style="width:7%"><strong>Hình ảnh</strong></th>
						<th style="width:7%"><strong>Cập nhật</strong></th>
						<th style="width:5%"><strong>Xóa</strong></th>
					</tr>
				 </thead>
		
				<tbody>         
					<?php
						include_once "dbconnect.php";
						
						$result = mysqli_query($conn,"SELECT sp_ma, sp_ten, sp_gia, sp_soluong,
							lsp_ten, nsx_ten FROM sanpham a JOIN loaisanpham b ON a.lsp_ma=b.lsp_ma
							JOIN nhasanxuat c ON a.nsx_ma=c.nsx_ma ORDER BY sp_ma ASC") or die(mysqli_error($conn));
						
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){	
					?>             
						<tr>
							<td class="cotCheckBox"><input type="checkbox" id="checkbox[]" name="checkbox[]"
								value="<?php echo $row['sp_ma'] ?>" /></td>
							<td><?php echo $row['sp_ma'] ?></td>
							<td><?php echo $row['sp_ten'] ?></td>
							<td><?php echo $row['sp_gia'] ?></td>
							<td><?php echo $row['sp_soluong'] ?></td>
							<td><?php echo $row['lsp_ten'] ?></td>
							<td><?php echo $row['nsx_ten'] ?></td>
								   
							<td align='center' class='cotNutChucNang'>
								<a href="index.php?khoatrang=quanly_hinhanhsanpham&ma=<?php echo $row['sp_ma'] ?>"><img src='images/image_edit.png' border='0' /></a>
							</td>
							<td align='center' class='cotNutChucNang'>
								<a href="index.php?khoatrang=quanly_sanpham_capnhat&ma=<?php echo $row['sp_ma'] ?>"><img src='images/edit.png' border='0'  /></a>
							</td>
							<td align='center' class='cotNutChucNang'>
								<a onclick="return deleteConfirm1('<?php echo $row['sp_ten'] ?>')" href="index.php?khoatrang=quanly_sanpham&ma=<?php echo $row['sp_ma'] ?>">
									<img src='images/delete.png' border='0' /></a>
							</td>
						</tr>                    
					<?php
						}
					?>   
				</tbody>       
			</table>    
			
			<!--Nút Thêm mới , xóa tất cả-->
			<div class="row" style="background-color:#FFF"><!--Nút chức nang-->
				<div class="col-md-1"></div>
				<div class="col-md-11">
					<input type="submit" value="Xóa mục chọn" name="btnXoa" id="btnXoa" class="btn btn-primary"
						onclick="return deleteConfirm2()" />
				</div>
			</div><!--Nút chức nang-->    
		</form>
	</div>
   