	<?php include_once "dbconnect.php" ?>

	<style>
        .product img{
            width: 253px;
            height:253px;
        }
    </style>

    <!-- Load sản phẩm -->
    <?php
        $sqlstring = "SELECT a.*, (SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE b.sp_ma=a.sp_ma LIMIT 0,1)
            AS sp_hinhdaidien FROM sanpham a";
        $result = mysqli_query ($conn,$sqlstring) or die(mysqli_error($conn));
    ?>

    <!--banner-starts-->
    <div class="bnr" id="home">
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider4"> <!-- chèn link 3 banner: nam festina, nữ danish, nam dw -->
                <li>
                    <a href="index.php?khoatrang=danhsachsanpham&lspma=4"><img src="images/bnr-1.jpg" alt="Festina Nam"/></a>
                </li>
    
                <li>
                    <a href="index.php?khoatrang=danhsachsanpham&lspma=7"><img src="images/bnr-2.jpg" alt="Danish Nữ"/></a>
                </li>
                <li>
                    <a href="index.php?khoatrang=danhsachsanpham&lspma=3"><img src="images/bnr-3.jpg" alt="DW Nam"/></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--banner-ends--> 
    <!--Slider-Starts-Here-->
        <script src="js/responsiveslides.min.js"></script>
         <script>
            // You can also use "$(window).load(function() {"
            $(function () {
              // Slideshow 4
              $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                  $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                  $('.events').append("<li>after event fired.</li>");
                }
              });			
            });
          </script>
    <!--End-slider-script-->
    <!--about-starts-->
    <div class="about"> 
        <div class="container">
            <div class="about-top grid-1">
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <a href="index.php?khoatrang=danhsachsanpham&lspma=2">
                        	<img class="img-responsive" src="images/abt-1.jpg" alt="Citizen Nam"/>
                        <figcaption>
                            <h4>Citizen</h4>
                            <p>Thương hiệu đồng hồ thời trang mang phong cách lịch lãm cho các quý ông.</p>	
                        </figcaption></a>			
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                    	<a href="index.php?khoatrang=danhsachsanpham&lspma=4">
                        	<img class="img-responsive" src="images/abt-2.jpg" alt="Festina Nam"/>
                        <figcaption>
                            <h4>Festina</h4>
                            <p>Thương hiệu đồng hồ thời trang trẻ trung, năng động giành cho nam giới.</p>	
                        </figcaption></a>			
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                    	<a href="index.php?khoatrang=danhsachsanpham&lspma=6">
                        	<img class="img-responsive" src="images/abt-3.jpg" alt="Bulova Nữ"/>
                        <figcaption>
                            <h4>Bulova</h4>
                            <p>Thương hiệu đồng hồ thời trang cao cấp của nữ.</p>	
                        </figcaption></a>			
                    </figure>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--about-end-->
    <!--product-starts-->  
    <div class="product"> 
        <div class="container">
            <div class="product-top">
            <h1 align="center">Sản phẩm</h1>
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