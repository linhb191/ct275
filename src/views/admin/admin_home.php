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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
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
    
    #home_active {
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
      		<h4><small>TRANG CHỦ</small></h4>
      		<hr> 
          <div class="row mx-auto">

                
                <div class="col-sm-4 text-center bg-info border rounded pt-3 pb-5">
                    <h1 class="pt-3">
                        <?php
                            echo $count_loai;
                        ?>
                    </h1>
                    
                    <h3>Loại bánh</h3>
                </div>
                <div class="col-sm-4 text-center bg-info border rounded pt-3 pb-5">
                    <h1 class="pt-3">
                        <?php
                            
                            echo $count_banh;
                        ?>
                    </h1>
                    
                    <h3>Bánh</h3>
                </div>
                <div class="col-sm-4 text-center bg-info border rounded pt-3 pb-5">
                    <h1 class="pt-3">
                        <?php
                            
                            echo $count_bill;
                        ?>
                    </h1>
                    
                    <h3>Đơn hàng</h3>
                </div>
          </div>
          <hr>
          <div>
              <h3>Thống kê</h3>
          </div>
            
    	</div>
	</div>
</div>

    <footer class="container-fluid">
        <p class="text-center">Nguyễn Văn Vũ Linh</p>
    </footer>
</body>
</html>