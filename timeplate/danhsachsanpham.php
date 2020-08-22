	<?php include_once "dbconnect.php" ?>

	<style>
        .product img{
            width: 253px;
            height:253px;
        }
    </style>

    <!-- Load sản phẩm -->
    <?php
		if(isset($_GET['lspma'])){
			$lsp_ma = $_GET['lspma'];
			$sqlstring = "SELECT a.*, c.lsp_mota, (SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE b.sp_ma=a.sp_ma LIMIT 0,1)
            AS sp_hinhdaidien FROM sanpham a, loaisanpham c WHERE a.lsp_ma=c.lsp_ma AND c.lsp_ma=$lsp_ma";
			
			$result1 = mysqli_query ($conn,$sqlstring) or die(mysqli_error($conn));
			$result2 = mysqli_query ($conn,$sqlstring) or die(mysqli_error($conn));
			$name = mysqli_fetch_row($result1);		
		}
		else
			echo '<meta http-equiv="refresh" content="0;URL=index.php?khoatrang=quanly_loaisanpham" />';     
    ?>

    <!--product-starts-->
    <div class="product"> 
        <div class="container">
            <div class="product-top">
            <h2>Sản phẩm: <?php echo $name[11] ?></h2>
            <?php 
            $count = 0;
            while ($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){ 
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