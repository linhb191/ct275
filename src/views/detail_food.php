<?php
    include('include/nav.php');
?>


<div class="content">
    <h2>CHI TIẾT SẢN PHẨM</h2>

    <p><?php echo htmlspecialchars($food->description); ?></p>
    <div class="row">
        <div class="col-md-4 text-center">
            <?php 
                   
                        if($food->image_name == "")
                        {
                                        
                            echo "<div class='error'>Không có ảnh.</div>";
                        }
                        else
                        {
                                        
                        ?>
            <img style="max-height: 300px;min-width: 400px" src="/images/food/<?php echo $food->image_name; ?>"
                alt="Chicke Hawain Pizza" class="img-responsive img-curve img-fluid">

            <?php

                        }
                    ?>
        </div>
        <div class="col-md-8">
            <h2 class="mb-3"><?php echo $food->title; ?></h2>
            <h3 class="pt-2">Giá: <?php echo number_format($food->price, 0,'','.');?> VNĐ</h3>
            <br>
            <form action="<?= $router->generate('addcart') ?>" method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <h4>Số lượng:</h4>
                    </div>
                    <div class="col-md-3 mr-5">
                        <input class="form-control" id="soluong" type="number" name="soluong" min="1" value="1">
                    </div>
                </div>

                <div class="col-md-5 mt-3 pt-2">
                    <input class="form-control btn-success rounded border p-2 " type="submit" name="addcart"
                        value="Đặt hàng">
                </div>
                <input type="hidden" name="tensp" value="<?php echo $food->title; ?>">
                <input type="hidden" name="gia" value="<?php echo $food->price; ?>">
                <input type="hidden" name="hinh" value="<?php echo $food->image_name;?>">
        </div>
    </div>
    </form>
</div>
</div>




</div>
<?php include('include/footer.php')?>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>