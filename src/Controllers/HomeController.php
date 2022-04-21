<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class HomeController
{
    

	public function index()
	{
		global $router;

		view('home', [
			'categories' =>Category::where('featured','Yes')->where('active','Yes')->limit(4)->get(),
			'foods' => Food::where('featured','Yes')->where('active','Yes')->limit(8)->get(),
			'router' => $router
		]);
	}

}