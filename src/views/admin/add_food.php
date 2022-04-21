<?php
    if(isset($_SESSION['add-food']))
    {
        echo $_SESSION['add-food'];
        unset($_SESSION['add-food']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="text-center offset-sm-2 my-4">Thêm Food</h1>
    <form action="<?= $router->generate('admin.createfood') ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
                    <div class="mb-3 row justify-content-center">
                        <label for="inputTen" class="col-sm-2 col-form-label">Tên:</label>
                        <div class="col-sm-6">
                        <input type="text" name="title" placeholder="Nhập tên sản phẩm" class="form-control" id="inputTen" required>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Chi tiết:</label>
                        <div class="col-sm-6">
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food." class="form-control" id="inputDescription" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Giá:</label>
                        <div class="col-sm-6">
                        <input type="number" name="price" class="form-control" id="inputPrice" required>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputAnh" class="col-sm-2 col-form-label">Ảnh</label>
                        <div class="col-sm-6">
                                <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputLoai" class="col-sm-2 col-form-label">Loại sản phẩm:</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="category">
                            <option>Chọn loại bánh</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->id?>"><?= $category->title?></option>    
			                <?php endforeach; ?>                         
                        </select>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputAnhnew" class="col-sm-2 col-form-label">Nổi bật: </label>
                        <div class="col-sm-6 form-check form-check-inline">
                            <div class="form-check form-check-inline">
                                <input  name="featured"class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes">
                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input  name="featured" class="form-check-input" type="radio" id="inlineCheckbox2" value="No">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-center">
                        <label for="inputAnhnew" class="col-sm-2 col-form-label">Hoạt động: </label>
                        <div class="col-sm-6 form-check form-check-inline">
                            <div class="form-check form-check-inline">
                                <input  name="active"class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes">
                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input   name="active" class="form-check-input" type="radio" id="inlineCheckbox2" value="No">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row justify-content-center">
                        <div class="offset-sm-2 col-sm-6">
                        <input type="submit" name="submit" value="Thêm sản phẩm" class="btn-secondary form-control bg-primary">
                        </div>
                    </div>
                </form>


    
	
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>