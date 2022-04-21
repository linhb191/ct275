<?php

namespace App\Controllers;

use App\Models\Bill;
use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class AdminHomeController
{
    public function index()
    {
        global $router;

		view('admin/admin_home', [
            'count_loai' => Category::count(),
            'count_banh' => Food::count(),
            'count_bill' => Bill::count(),			
			'router' => $router
		]);
    }

}