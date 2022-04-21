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
<?php
    if(isset($_SESSION['add-food']))
    {
        echo $_SESSION['add-food'];
        unset($_SESSION['add-food']);
    }
    if(isset($_SESSION['edit-food']))
    {
        echo $_SESSION['edit-food'];
        unset($_SESSION['edit-food']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Food</title>
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
    #food_active {
		background-color: #04AA6D;
		color: white;
	}
  </style>
</head>
<body>

<div class="container">
  	<div class="row content">
    	<?php include('include/dashboard.php');?>
    	<div class="col-sm-9 pt-3" style="background-color: hsla(89, 43%, 51%, 0.3);">
      		<h4><small>QUẢN LÝ FOOD</small></h4>
      		<hr> 
            <div class="my-4">
                <a href="/admin_food/add"><button class="btn-primary border p-2" style="width: 100px;">Thêm bánh</button></a>
            </div>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Nổi bật</th>
                        <th>Hoạt động</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($foods as $food) : ?>
                        <tr>
                            <td><?= $food->title ?></td>
                            <td><?php echo number_format($food->price, 0,'','.');?></td>
                            <td><img src="images/food/<?php echo $food->image_name; ?>" width="150px" height="75"></td>
                            <td><?= $food->featured?></td>
                            <td><?= $food->active?></td>
                            <td>
                                <a href="/admin_food/edit/<?= $food->id?>"><button class="btn-secondary border p-2">Cập nhật</button></a>
                                <a id="<?= $food->id?>"><button class="btn-danger border p-2 delete">Xóa</button></a>                        
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
                const title = $(this).closest('tr').find('td:first').text();
                const id = $(this).closest('a').prop('id');
                
                if (confirm(`Bạn có muốn xóa bánh ${title}?`)) {
                    window.location = `/admin_food/delete/${id}`;
                }
            });
        });
    </script>
</html>




    
