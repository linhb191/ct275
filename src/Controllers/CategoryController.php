<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class CategoryController
{
    

	public function index()
	{
		global $router;
		view('category', [
			'categories' => Category::where('active','Yes')->get(),
			'router' => $router
		]);
	}
    
}