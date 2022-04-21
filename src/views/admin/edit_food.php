<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit loại</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
        if(isset($_SESSION['edit']))
        {
            echo $_SESSION['edit'];
            unset($_SESSION['edit']);
        }
    ?>
    <h1 class="text-center offset-sm-2 my-4">Edit bánh</h1>
    
    <form action="<?= $router->generate('admin.editfood') ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
        <div class="mb-3 row justify-content-center">
            <label for="inputTen" class="col-sm-2 col-form-label">Tên sản phẩm:</label>
            <div class="col-sm-6">
                <input type="text" name="title" value="<?php echo $food->title;?>" class="form-control" id="inputTen" required>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputDes" class="col-sm-2 col-form-label">Chi tiết:</label>
            <div class="col-sm-6">
                <textarea name="description" cols="30" rows="5" class="form-control" id="inputDes" required><?php echo $food->description; ?></textarea>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputPrice" class="col-sm-2 col-form-label">Giá sản phẩm:</label>
            <div class="col-sm-6">
                <input type="number" name="price" value="<?php echo $food->price;?>" class="form-control" id="inputPrice" required>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputAnh" class="col-sm-2 col-form-label">Current Image</label>
            <div class="col-sm-6">
            <?php
                        
                if($food->image_name != "")
                {
                
            ?>
                    <img src="/images/food/<?php echo $food->image_name;?>" width="150px">
            <?php
                }
                else
                {
                                
                    echo "<div class='error'>Không có ảnh.</div>";
                }
            ?>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputNewimage" class="col-sm-2 col-form-label">Chọn ảnh mới:</label>
            <div class="col-sm-6">
                <input type="file" name="image" value="<?php echo $food->price;?>" class="form-control" id="inputNewimage">
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputLoai" class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-6">
                <select name="category" class="form-select">
                
                    <?php foreach ($categories as $category) : ?>
                        <option <?php if($food->category_id == $category->id){echo "selected";} ?> value="<?= $category->id?>"><?= $category->title?></option>    
			        <?php endforeach; ?>               
                                    
                                
                            
                            
                </select>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputAnhnew" class="col-sm-2 col-form-label">Nổi bật: </label>
            <div class="col-sm-6 form-check form-check-inline">
                <div class="form-check form-check-inline">
                    <input <?php if($food->featured=="Yes"){echo "checked";}?> name="featured"class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes">
                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input  <?php if($food->featured=="No"){echo "checked";}?> name="featured" class="form-check-input" type="radio" id="inlineCheckbox2" value="No">
                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                </div>
            </div>
        </div>
        <div class="mb-3 row justify-content-center">
            <label for="inputAnhnew" class="col-sm-2 col-form-label">Hoạt động: </label>
            <div class="col-sm-6 form-check form-check-inline">
                <div class="form-check form-check-inline">
                    <input <?php if($food->active=="Yes"){echo "checked";}?> name="active"class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes">
                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                </div>
            <div class="form-check form-check-inline">
                <input  <?php if($food->active=="No"){echo "checked";}?> name="active" class="form-check-input" type="radio" id="inlineCheckbox2" value="No">
                <label class="form-check-label" for="inlineCheckbox2">No</label>
            </div>
        </div>
        


        <div class="mb-3 row justify-content-center">
            <div class="offset-sm-2 col-sm-6">
                <input type="hidden" name="id" value="<?php echo $food->id; ?>" >
                <input type="hidden" name="current_image" value="<?php echo $food->image_name; ?>">
                <input type="submit" name="submit" value="Cập nhật sản phẩm" class="btn-secondary bg-primary form-control">
            </div>
        </div>
    </form>

    
	
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>