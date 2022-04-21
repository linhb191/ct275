<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="container">
    <div class="row">
                    <div class="col-md-8">
                        <h4>Thông tin đơn hàng</h4><hr>
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
                                <td class="text-center"><img src="/images/food/<?=$food[0]?>" width="150px" height="100px"></td>                
                                <td class="text-center py-5"><?php echo number_format($food[2], 0,'','.');?></td>
                                <td class="text-center py-5"><?=$food[3]?></td>
                                <td class="text-center py-5"><div><?php echo number_format($food[4], 0,'','.');?></div></td>          
                                
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
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h4>THÔNG TIN NHẬN HÀNG</h4> 
                        <hr>
                        <form class="" action="<?= $router->generate('user.checkout') ?>" method="POST">
                            
                                
                                    <div class="mb-3">
                                        <input type="text" name="hoten" value="<?php if(isset($_SESSION['thongtindathang'])) echo $_SESSION['thongtindathang'][0][0]; ?>" placeholder="Nhập họ tên" required style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark">
                                    </div>
                                    <div class="mb-4">
                                        <input  type="text" name="sdt" value="<?php if(isset($_SESSION['thongtindathang'])) echo $_SESSION['thongtindathang'][0][2]; ?>" required placeholder="Nhập số điện thoại" style="height: 45px;" class="form-control rounded-2 text-dark" id="psw">
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" name="email" value="<?php if(isset($_SESSION['thongtindathang'])) echo $_SESSION['thongtindathang'][0][3]; ?>" required placeholder="Nhập email" style="height: 45px;" class="form-control rounded-2 text-dark" id="psw">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                        <textarea class="form-control" name="diachi" cols="50" rows="7" required style="height: 115px"><?php if(isset($_SESSION['thongtindathang'])) echo $_SESSION['thongtindathang'][0][1]; ?></textarea>
                                        <label for="floatingTextarea2">Địa chỉ</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select name="pttt" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option <?php if(isset($_SESSION['thongtindathang']) && $_SESSION['thongtindathang'][0][4] == 0){echo "selected";}  ?> value="0">Thanh toán khi nhận hàng</option>
                                            <option <?php if(isset($_SESSION['thongtindathang']) && $_SESSION['thongtindathang'][0][4] == 1){echo "selected";}  ?> >VN Pay</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <input type="hidden" name="total" value="<?=$tongtien?>">
                                        <input type="submit" class="btn-success border p-2 form-control" value="Thanh toán">
                                    </div>
                                
                            
                        </form>
                    </div>
                    
    </div>
</body>
</html>