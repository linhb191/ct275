<?php
    include('include/nav.php');
?>
<style>
    #category_active {
		background-color: #04AA6D;
		color: white;
	  }
</style>    
            <div class="content">
                <div class="row mx-1">
                    <h2 class="text-center">Danh Sách Loại Sản Phẩm</h2>
                </div>
                
                
                <div class="row m-1 " >
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

            <div class="row footer">

            </div>
        </div>
    </body>
    

</html>
