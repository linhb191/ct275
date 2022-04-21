<?php
    include('include/nav.php');
?>
<style>
    #food_active {
		background-color: #04AA6D;
		color: white;
	  }
</style>
            <div class="content">
                <div class="row mx-1">
                    <h2 class="text-center">Danh Sách Sản Phẩm</h2>
                </div>
                
                
                <div class="row m-1 " >
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

            <div class="row footer">

            </div>
        </div>
    </body>
    

</html>
