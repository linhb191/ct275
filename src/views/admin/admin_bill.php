<?php
    //Kiểm tra đăng nhập
    if(!isset($_SESSION['admin']))
    {
        redirect(
				$router->generate(
					'admin.showlogin'	
				)
			);
    }

    if(isset($_SESSION['delete-bill']))
    {
        echo $_SESSION['delete-bill'];
        unset($_SESSION['delete-bill']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý đơn hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    
    
    }

    li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
    }

    /* Change the link color on hover */
    li a:hover {
    background-color: #555;
    color: white;
    }
    #bill_active {
		background-color: #04AA6D;
		color: white;
	}
  </style>
</head>
<body>

<div class="container">
  	<div class="row content" style="min-height: 700px;">
        <?php include('include/dashboard.php');?>
    	
    	<div class="col-sm-9 pt-3" style="background-color: hsla(89, 43%, 51%, 0.3);">
      		<h4><small>QUẢN LÝ ĐƠN HÀNG</small></h4>
      		<hr> 
            
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
                                        <a href="/admin_bill/<?=$bill->id?>"><button class="btn-secondary border p-2">Chi tiết</button></a>
                                        <a id="<?=$bill->id?>"><button class="btn-danger border p-2 delete">Xóa</button></a>                        
                                    </td>
                                    
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    	</div>
	</div>
    <div class="row">
        <p class="text-center">Footer Text</p>
    </div>
</div>

</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                const stt = $(this).closest('tr').find('td:first').text();
                const id = $(this).closest('a').prop('id');
                
                if (confirm(`Bạn có muốn xóa đơn hàng số ${stt}?`)) {
                    window.location = `/admin_bill/delete/${id}`;
                }
            });
        });
    </script>
</html>




    
	
