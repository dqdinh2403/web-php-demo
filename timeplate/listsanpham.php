	<?php include_once "dbconnect.php" ?>

	<style>
        .product img{
            width: 253px;
            height:253px;
        }
    </style>

    <!-- Load sản phẩm -->
    <?php
		if(isset($_GET['ma'])){
			$ma = $_GET['ma'];
			
			if($ma==1)								
				$sqlstring = "SELECT a.*, (SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma=b.sp_ma
					LIMIT 0,1) AS sp_hinhdaidien FROM sanpham a ORDER BY sp_ngaycapnhat DESC";
			else						
				$sqlstring = "SELECT a.*, (SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma=b.sp_ma
					LIMIT 0,1) AS sp_hinhdaidien FROM sanpham a ORDER BY sp_gia DESC";					
					
			$result = mysqli_query ($conn,$sqlstring) or die(mysqli_error($conn));		
		}
		else
			echo '<meta http-equiv="refresh" content="0;URL=index.php" />';     
    ?>

    <!--product-starts-->
    <div class="product"> 
        <div class="container">
            <div class="product-top">
            <h2><?php if($ma==1) echo "Sản phẩm mới nhất:"; else echo "Sản phẩm bán chạy nhất:"; ?></h2>
            <?php 
            $count = 0;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                if(($count+1)%4 == 1){
                    echo "<div class='product-one'>";
                }
            ?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma'] ?>" class="mask">
                            <img class="img-responsive zoom-img"
                            src="products/<?php if($row['sp_hinhdaidien']==null) echo "no_image.gif"; else echo $row['sp_hinhdaidien'] ?>" alt="" />
                        </a>
                        <div class="product-bottom">
                            <h3><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma'] ?>"><?php echo $row['sp_ten'] ?></a></h3>
                            <p>Mua ngay</p>
                            <h4><a class="item_add" href="#"><i></i>
                                <span class=" item_price"><?php echo number_format($row['sp_gia'],0,',','.') ?></span></a></h4>
                        </div>
                        <div class="srch">
                            <span>Sale -<?php echo $row['sp_soluong']-($row['lsp_ma']+$row['nsx_ma']) ?>%</span>
                        </div>
                    </div>
                </div>					
            <?php	
                if(($count+1)%4 == 0){	
                    echo "<div class='clearfix'></div>
                        </div>";
                }
                $count++;
             } 
             ?>	
             </div>			
            </div>
        </div>
    </div>
    <!--product-end-->