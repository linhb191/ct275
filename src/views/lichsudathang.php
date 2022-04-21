<?php
    include('include/nav.php');
?>
<style>
    #bill_active {
		background-color: #04AA6D;
		color: white;
	  }
</style>
            <div class="content">
                <div class="row mx-1">
                    <h2 class="text-center">Danh Sách Đơn Hàng Đã Đặt</h2>
                </div>
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <tr> 
                            <th>STT</th>             
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>                        
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php foreach ($bills as $key => $bill) : ?>
                        <tr>
                            
                                    <td ><?= $key + 1 ?></td>
                                    <td><?= $bill->name ?></td>
                                    
                                    <td><?= $bill->ngaydat?></td>
                                    <td><?=number_format($bill->total, 0,'','.');?> VNĐ</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <a href="/user/bill/<?=$bill->id?>"><button class="btn-primary border p-2">Chi tiết</button></a>
                                    </td>
                                    
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row footer">

            </div>
        </div>
    </body>
    

</html>
