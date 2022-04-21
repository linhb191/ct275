<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class DetailFoodController
{
    

	public function index($id)
	{
		global $router;
        $food = Food::where('id',$id)->first();
		view('detail_food', [
			'food' => $food,
			'router' => $router
		]);
	}
}