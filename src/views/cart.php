<?php
    if(isset($_SESSION['cart-empty']))
    {
        echo $_SESSION['cart-empty'];
        unset($_SESSION['cart-empty']);
    }
    if(isset($_SESSION['checkout']))
    {
        echo $_SESSION['checkout'];
        unset($_SESSION['checkout']);
    }
?>
<?php
    include('include/nav.php');
?>
<style>
    #cart_active {
		background-color: #04AA6D;
		color: white;
	  }
</style>

  	<div class="content">
    	<table class="table ">
            <tr>
                <th class="text-center">STT</th>
                <th >Tên sản phẩm</th>
                <th class="text-center">Hình</th>
                <th class="text-center">Đơn giá</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Thàng tiền</th>
                <th class="text-center">Xóa</th>               
            </tr>
            <?php 
                $tongtien=0;
                if(!empty($foods))
                {
                    
                    $STT=1;
                    
                    foreach ($foods as $key => $food) :
                        $tongtien = $tongtien + $food[4];
                        
            ?>
            <tr>
                <td class="text-center py-5"><?php echo $STT++;?></td>
                <td class="py-5"><?=$food[1]?></td>
                <td class="text-center"><img src="images/food/<?=$food[0]?>" width="150px" height="100px"></td>                
                <td class="text-center py-5"><?php echo number_format($food[2], 0,'','.');?></td>
                <td class="text-center py-5"><?=$food[3]?></td>
                <td class="text-center py-5"><div><?php echo number_format($food[4], 0,'','.');?></div></td>          
                <td class="text-center py-5">
                    <a href="/cart/delete/<?php echo $key;?>" class="btn-danger border rounded p-2" style="width: 150px;text-decoration: none;">Xóa</a>
                </td>
            </tr>  
            <?php 
                
                endforeach;
                }
                else
                {
                    echo '<tr><td colspan="6">Giỏ hàng rỗng</td></tr>';
                }
            ?>
            
            <tr>
                <td colspan="5" class="text-end"><h4>Tổng đơn hàng</h4></td>                           
                <td class="text-center"><h5 class="pt-1"><?=number_format($tongtien, 0,'','.')?> VNĐ</h5></td>
            </tr>
            
            <input type="hidden" name="total" value="'.$tong.'">
            
            
            
        </table>

        <div>
            <a href="/user/checkout" class="btn-success border rounded py-2 px-4" style="width: 150px;text-decoration: none;">Đặt hàng</a>
            <a href="/cart/delete_all" class="btn-danger border rounded p-2" style="width: 150px;text-decoration: none;">Xóa giỏ hàng</a>
            <a href="/food" class="btn-primary border rounded p-2" style="width: 150px;text-decoration: none;">Tiếp tục đặt hàng</a>
        </div>
	</div>
    
</div>

</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>




    
	
