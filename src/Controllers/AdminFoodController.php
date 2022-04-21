<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class AdminFoodController
{
    

	public function show_food()
	{
		global $router;

		view('admin/admin_foods', [
			'foods' => Food::orderBy('title')->get(),
			'router' => $router
		]);
	}

	public function show_add_food()
	{
		global $router;

		view('admin/add_food', [
			'categories' => Category::where('active','Yes')->orderBy('title')->get(),
			'router' => $router
		]);

	}

	public function create_food()
	{
		global $router;

		//Lay du lieu tu form
		$title = $_POST['title'];
        $description = $_POST['description'];
        $price = number_format($_POST['price'], 3, '.', '');
        $category = $_POST['category'];

		if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
    	else
        {
        	$featured = "No";   
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
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
                    
                $image_name = "Food-Name-".rand(0000,9999).".".$ext;
               
                $src = $_FILES['image']['tmp_name'];
                        
                $dst = "images/food/".$image_name;
                        
                $upload = move_uploaded_file($src,$dst);
                
                if($upload == false)
                {
                            
                    $_SESSION['add-food'] = "<script>alert('Upload ảnh thất bại.');</script>";
					redirect(
						$router->generate(
							'admin.add_food'	
						)
					);
                    
                    die();
                }
            }
        }
        else
        {
        	$image = ""; 
        }

		Food::create([
			'title' => $title,
			'description' => $description,
			'price' => $price,
			'image_name' => $image_name,
			'category_id' => $category,
			'featured' => $featured,
			'active'=> $active
		]);

		$_SESSION['add-food'] = "<script>alert('Thêm thành công.');</script>";
		redirect(
			$router->generate(
				'admin.showfood',	
			)
		);
	}

	public function show_edit_food($id)
	{
		global $router;
        //echo $id;
        $data = Food::where('id', $id)->first();
        $categories = Category::all();
		// foreach ($categories as $category) :
		// 	echo $category->title;
		// 	echo $category->id;
		// endforeach;
		view('admin/edit_food', [
            'food' => $data,
			'categories' => $categories,
			'router' => $router
		]);
	}

	public function edit_food()
	{
		global $router;
        //Lay du lieu tu form
		$id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

		if(isset($_FILES['image']['name']))
        {
                
        	$image_name = $_FILES['image']['name'];

            if($image_name != "")
            {

                $ext = end(explode('.', $image_name));
                //$file_ext=strtolower($ext);

                $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "images/food/".$image_name;

            
                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload==false)
                {

                    $_SESSION['edit-food'] = "<script>alert('Upload ảnh thất bại.');</script>";
						redirect(
							$router->generate(
								'admin.showfood'													
							)
						);
            

                    die();
                }

                if($current_image!="")
                {
                	$remove_path = "images/food/".$current_image;
                    $remove = unlink($remove_path);
                    if($remove == false)
                    {
                        
						$_SESSION['edit-food'] = "<script>alert('Xóa ảnh thất bại.');</script>";
						redirect(
							$router->generate(
								'admin.showfood'													
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

		$food = Food::find($id);
        $food->title = $title;
		$food->description = $description;
		$food->price = $price;
        $food->image_name = $image_name;
		$food->category_id = $category;
        $food->featured = $featured;
        $food->active = $active;
        $food->save();
        $_SESSION['edit-food'] = "<script>alert('Cập nhật thành công.');</script>";
        redirect(
			$router->generate(
				'admin.showfood'	
			)
		);
	}
    public function delete_food($id)
	{
		global $router;
        
        Food::find($id)->delete();

        redirect(
			$router->generate(
				'admin.showfood'	
			)
		);

	}


}