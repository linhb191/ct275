<?php
    if(isset($_SESSION['huy-bill']))
    {
        echo $_SESSION['huy-bill'];
        unset($_SESSION['huy-bill']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="container">
    <div class="row content" style="min-height: 700px;">
                    <div class="col-md-9 pt-2">
                        <h4>THÔNG TIN ĐƠN HÀNG</h4><hr>
                        <table class="table ">
                            <tr>
                                <th class="text-center">STT</th>
                                <th >Tên sản phẩm</th>
                                <th class="text-center">Hình</th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thàng tiền</th>
                                              
                            </tr>
                            <?php                                    
                                foreach ($foods as $key => $food) : 
                                                                       
                            ?>
                            <tr>
                                <td class="text-center py-5"><?php echo $key + 1;?></td>
                                <td class="py-5"><?=$food->tensp?></td>
                                <td class="text-center"><img src="/images/food/<?=$food->hinhsp?>" width="150px" height="100px"></td>                
                                <td class="text-center py-5"><?php echo number_format($food->dongia, 0,'','.');?></td>
                                <td class="text-center py-5"><?=$food->soluong?></td>
                                <td class="text-center py-5"><div><?php echo number_format($food->thanhtien, 0,'','.');?></div></td>          
                               
                            </tr>  
                            <?php                                 
                                endforeach;
                            ?>
                            
                            <tr>
                                <td colspan="5" class="text-end"><h4>Tổng đơn hàng</h4></td>                           
                                <td class="text-center"><h5 class="pt-1"><?=number_format($bill->total, 0,'','.')?> VNĐ</h5></td>
                            </tr>          
                        </table>
                    </div>
                    <div class="col-md-3 pt-2">
                        <h4>THÔNG TIN NHẬN HÀNG</h4> 
                        <hr>          
                                    <div class="mb-3">
                                        <h5>Họ tên: <?=$bill->name?></h5>
                                    </div>
                                    <div class="mb-4">
                                        <h5>Số điện thoại: <?=$bill->tel?></h5>                                    
                                    </div>
                                    <div class="mb-4">
                                        <h5>Địa chỉ: <?=$bill->address?></h5>
                                    </div>
                                    <div class="mb-3">
                                        <h5>Email: <?=$bill->email?></h5>
                                    </div>
                                    <div class="mb-3">
                                        <h5>Ngày đặt: <?=$bill->ngaydat?></h5>
                                    </div>
                                    <div class="mb-3">
                                        <h5>Trạng thái: 
                                            <?php if( $bill->status == 0){
                                                echo "Chưa xử lý";
                                            }else if($bill->status == 1){
                                                echo "Đã xử lý";
                                            }else if($bill->status ==2 ){
                                                echo "Đang giao hàng";
                                            }else if($bill->status == 3){
                                                echo "Đã hoàn thành";
                                            }else{
                                                echo "Hủy";
                                            }
                                            ?>
                                        </h5>
                                    </div>
                        <hr>
                        <?php
                            if($bill->status != 4)
                            {
                                ?>
                                    <form action="<?= $router->generate('user.huybill') ?>" method="POST">                            
                                        <div>
                                            <input hidden name="id_bill" value="<?=$bill->id?>">
                                            <input class="form-control btn-danger border rounded" name="submit" type="submit" value="Hủy đơn hàng">
                                        </div>
                                    </form>
                                <?php
                            }
                        ?>
                        
                        
                    </div>
                    
    </div>
</body>
</html>