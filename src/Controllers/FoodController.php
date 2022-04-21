<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class FoodController
{
    

	public function index()
	{
		global $router;
		view('food', [
			'foods' => Food::where('active','Yes')->get(),
			'router' => $router
		]);
	}
	public function showFoodCategory($id)
	{
		global $router;
		view('food', [
			'foods' => Food::where('active','Yes')->where('category_id', $id)->get(),
			'router' => $router
		]);
	}

}