<?php
    include('include/nav.php');
?>
<style>
    #home_active {
		background-color: #04AA6D;
		color: white;
	  }
</style>
        <div class="content">
            <div class="row">
                
            </div>
            <h2 class="text-center">CÁC LOẠI BÁNH NỔI BẬT</h2>
            <div class="row m-1 mx-auto">
                
                <?php foreach ($categories as $category) : ?>
                    <?php
                        if($category->image_name=="")
                        {
                            echo "<div class='error'>Image Not Available.</div>";
                        }
                        else
                        {
                        ?>
       
                            <div class="col-sm-3 padding-1 mb-2" >   
                                <div class="rounded" style=" background-image: linear-gradient(#2feb60, #1edce6);">                          
                                    <a href="/category/food/<?=$category->id?>">                
                                        <img style="width: 100%;height:350px;"  src="images/category/<?php echo $category->image_name; ?>" alt="" class="img-fluid rounded">                
                                        <div class="text-center">
                                            <h4  class="px-2"><?php echo $category->title; ?></h4>
                                        </div>
                                    </a>
                                </div> 
                            </div> 
                        
                        <?php
                        }
                        ?>
                    <?php endforeach; ?>
            </div>
            <h2 class="text-center">CÁC BÁNH NỔI BẬT</h2>
            <div class="row m-1 mx-auto">
                
                <?php foreach ($foods as $food) : ?>
                    <?php
                        if($food->image_name=="")
                        {
                            echo "<div class='error'>Image Not Available.</div>";
                        }
                        else
                        {
                        ?>
       
                            <div class="col-sm-3 padding-1 mb-2" >   
                                <div class="rounded" style=" background-image: linear-gradient(#2feb60, #1edce6);">                          
                                <a href="/detail_food/<?=$food->id?>">                
                                    <img style="width: 100%;height:250px;"  src="/images/food/<?php echo $food->image_name; ?>" alt="" class="img-fluid rounded">                
                                    <div style="min-height: 60px;">
                                        <h4  class="px-2"><?php echo $food->title; ?></h4>
                                    </div>
                                    <h5 class="px-2"><?php echo number_format($food->price, 0,'','.');?> VNĐ</h5>
                                </a>
                                <form action="<?= $router->generate('addcart') ?>" method="POST">
                                    <div class="row mx-2">
                                        <div class="col-sm-6 mb-1 padding-0">
                                            <label for="#soluong" class="form-label" style="margin-top: 5px;">Số lượng:</label>
                                        </div>
                                        <div class="col-lg-6 mb-1 padding-0">
                                            <input class="form-control" id="soluong" type="number" name="soluong" min="1" value="1">
                                        </div>
                                    </div>
                                    <div class="p-2">
                                            <input class=" btn-success border form-control" type="submit" name="addcart" value="Đặt hàng">
                                    </div>   
                                    
                                    <input type="hidden" name="tensp" value="<?php echo $food->title; ?>">
                                    <input type="hidden" name="gia" value="<?php echo $food->price; ?>">
                                    <input type="hidden" name="hinh" value="<?php echo $food->image_name;?>">
                                </form>
                                </div> 
                            </div> 
                        
                        <?php
                        }
                        ?>
                        <?php endforeach; ?>
            </div>
            <footer class="text-center text-lg-start bg-light text-muted padding-0">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                    <span>Kết nối với chúng tôi qua các mạng xã hội:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Shop Food Vu Linh
                        </h6>
                        <p>
                            Cửa hàng chúng tôi đã trải qua nhiều năm kinh nghiệm buôn bán và làm các loại bánh.
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Sản phẩm
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pizza</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">MoMo</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Burger</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Nước giải khát</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> Phú Tân, An Giang, Việt Nam</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="#">Vu Linh developer</a>
                </div>
                <!-- Copyright -->
            </footer>

            
        </div>
    </body>
    

</html>

