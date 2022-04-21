<?php

namespace App\Controllers;

use App\Models\Category;

use App\Models\Food;

class AdminCategoryController
{
    public function show_category()
	{
		global $router;

		view('admin/admin_categories', [
			'categories' => Category::orderBy('title')->get(),
			'router' => $router
		]);
	}

	public function show_add_category()
	{
		global $router;

		view('admin/add_category', [
			'router' => $router
		]);
	}

	public function create_category()
	{
		global $router;

		 //Lấy dữ liệu từ form
        $title = $_POST['title'];
        
        if(isset($_POST['featured']))
        {
            
            $featured  = $_POST['featured'];
        }
        else
        {
            
            $featured = "No";
        }

        if(isset($_POST['active']))
        {
                            
        	$active  = $_POST['active'];
        }
        else
    	{
                            
            $active = "No";
        }

        
        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
                
                $ext = end(explode('.', $image_name));

                
                $image_name = "Food_Category_".rand(000,999).'.'.$ext;  

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "images/category/".$image_name;

                
                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload==false)
                {
                    
                    $_SESSION['add-category'] = "<div class='error'>Upload ảnh thất bại.</div>";
                    
					

                    
                    die();
                }

            }
        }
        else
        {
        
        	$image_name = "";
        }

		Category::create([
			'title' => $title,
			'image_name' => $image_name,
			'featured' => $featured,
			'active'=> $active
		]);

		$_SESSION['add'] = "<script>alert('Thêm thành công.');</script>";
		redirect(
			$router->generate(
				'admin.showcategory',	
			)
		);
		
	}
    
    public function show_edit_category($id)
	{
		global $router;
        // echo $id;
        $data = Category::where('id', $id)->first();
        // echo $data->title;
		view('admin/edit_category', [
            'category' => $data,
			'router' => $router
		]);
	}

    public function edit_category()
	{
		global $router;
        
        //Lấy dữ liệu từ form qua phương thức POST
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        //Cập nhật image mới được chọn
        //Kiểm tra image đã được chọn chưa
        if(isset($_FILES['image']['name']))
        {
        
            $image_name = $_FILES['image']['name'];
           
            if($image_name != "")
            {
                //Lấy đuôi file image
                $ext = end(explode('.', $image_name));
                //Tạo tên mới cho image
                $image_name = "Food_Category_".rand(000,999).'.'.$ext;  //e.g. Food_Category_834.jpg

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "images/category/".$image_name;

                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload==false)
                {
                            
                    $_SESSION['edit'] = "<script>alert('Upload ảnh thất bại.');</script>";
                    redirect(
                        $router->generate(
                            'admin.showcategory'
                            
                        )
                    );
                    
                    die();
                }
                //Xóa image cũ
                if($current_image != "")
                {
                    $remove_path = "images/category/".$current_image;
                    $remove = unlink($remove_path);

                    if($remove == false)
                    {
                        $_SESSION['edit'] = "<script>alert('Xóa ảnh thất bại.');</script>";
                        redirect(
                            $router->generate(
                                'admin.showcategory'
                                
                            )
                        );
                        die(); 
                    }
                }

                    
            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }

        $category = Category::find($id);
        $category->title = $title;
        $category->image_name = $image_name;
        $category->featured = $featured;
        $category->active = $active;
        $category->save();
        $_SESSION['edit'] = "<script>alert('Cập nhật thành công.');</script>";
        redirect(
			$router->generate(
				'admin.showcategory'	
			)
		);
	}

    public function delete_category($id)
	{
		global $router;
        
        Category::find($id)->delete();

        redirect(
			$router->generate(
				'admin.showcategory'	
			)
		);

	}


}