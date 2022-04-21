<?php

require '../bootstrap.php';

$router = new AltoRouter();



//Hiển thị trang home
$router->map(
	'GET',
	'/admin',
	[App\Controllers\AdminHomeController::class, "index"],
	'admin.home'
);
//Hiển thị trang quản lý food
$router->map(
	'GET',
	'/admin_food',
	[App\Controllers\AdminFoodController::class, "show_food"],
	'admin.showfood'
);
//Hiển thị trang add food
$router->map(
	'GET',
	'/admin_food/add',
	[App\Controllers\AdminFoodController::class, "show_add_food"],
	'admin.add_food'
);
//Add Food vào csdl
$router->map(
	'POST',
	'/admin_food/add',
	[App\Controllers\AdminFoodController::class, "create_food"],
	'admin.createfood'
);
//Hiện thị trang edit food
$router->map(
	'GET',
	'/admin_food/edit/[a:id]',
	[App\Controllers\AdminFoodController::class, "show_edit_food"],
	'admin.showeditfood'
);
//Edit food
$router->map(
	'POST',
	'/admin_food/edit',
	[App\Controllers\AdminFoodController::class, "edit_food"],
	'admin.editfood'
);
//Xóa bánh
$router->map(
	'GET',
	'/admin_food/delete/[a:id]',
	[App\Controllers\AdminFoodController::class, "delete_food"],
	'admin.deletefood'
);

//Trang quản lý category
$router->map(
	'GET',
	'/admin_category',
	[App\Controllers\AdminCategoryController::class, "show_category"],
	'admin.showcategory'
);
//Hiển thị trang thêm category
$router->map(
	'GET',
	'/admin_category/add',
	[App\Controllers\AdminCategoryController::class, "show_add_category"],
	'admin.addcategory'
);
//Thêm category
$router->map(
	'POST',
	'/admin_category/add',
	[App\Controllers\AdminCategoryController::class, "create_category"],
	'admin.createcategory'
);
//Hiển thị trang edit category
$router->map(
	'GET',
	'/admin_category/edit/[a:id]',
	[App\Controllers\AdminCategoryController::class, "show_edit_category"],
	'admin.showeditcategory'
);
//Cập nhật category
$router->map(
	'POST',
	'/admin_category/edit',
	[App\Controllers\AdminCategoryController::class, "edit_category"],
	'admin.editcategory'
);
//Xóa category
$router->map(
	'GET',
	'/admin_category/delete/[a:id]',
	[App\Controllers\AdminCategoryController::class, "delete_category"],
	'admin.deletecategory'
);
//Hiển thị trang quản lý bill
$router->map(
	'GET',
	'/admin_bill',
	[App\Controllers\AdminBillController::class, "index"],
	'admin.showbill'
);
//Hiển thị trang detail Bill
$router->map(
	'GET',
	'/admin_bill/[a:id]',
	[App\Controllers\AdminBillController::class, "detailBill"],
	'admin.showdetailbill'
);
//Cập nhật trạng thái đơn hàng
$router->map(
	'POST',
	'/admin_bill',
	[App\Controllers\AdminBillController::class, "updateBill"],
	'updatebill'
);
//Delete bill
$router->map(
	'GET',
	'/admin_bill/delete/[a:id]',
	[App\Controllers\AdminBillController::class, "deleteBill"],
	'deletebill'
);
//Hiển thị trang đăng nhập admin
$router->map(
	'GET',
	'/admin/login',
	[App\Controllers\AuthController::class, "showAdminLoginForm"],
	'admin.showlogin'
);
//Xử lý đăng nhập
$router->map(
	'POST',
	'/admin/login',
	[App\Controllers\AuthController::class, "loginAdmin"],
	'admin.login'
);
//Đăng xuất
$router->map(
	'GET',
	'/admin/logout',
	[App\Controllers\AuthController::class, "logoutAdmin"],
	'admin.logout'
);

//Hiển thị trang home
$router->map(
	'GET',
	'/',
	[App\Controllers\HomeController::class, "index"],
	'home'
);

//Hiển thị trang food
$router->map(
	'GET',
	'/food',
	[App\Controllers\FoodController::class, "index"],
	'food'
);
//Hiển thị food theo category
$router->map(
	'GET',
	'/category/food/[a:id]',
	[App\Controllers\FoodController::class, "showFoodCategory"],
	'foodcategory'
);
//Hiển thị trang giỏ hàng
$router->map(
	'GET',
	'/cart',
	[App\Controllers\CartController::class, "index"],
	'cart'
);
//Thêm sản phẩm vào giỏ hàng
$router->map(
	'POST',
	'/cart/add',
	[App\Controllers\CartController::class, "addCart"],
	'addcart'
);
//Xóa sản phẩm trong giỏ hàng
$router->map(
	'GET',
	'/cart/delete/[a:id]',
	[App\Controllers\CartController::class, "deleteSanPham"],
	'deleteSanPham'
);
//Xóa tất cả sản phẩm trong giỏ hàng
$router->map(
	'GET',
	'/cart/delete_all',
	[App\Controllers\CartController::class, "deleteCart"],
	'deleteCart'
);
//Hiển thị trang chi tiết sản phẩm
$router->map(
	'GET',
	'/detail_food/[a:id]',
	[App\Controllers\DetailFoodController::class, "index"],
	'detail.food'
);
//Show Login User
$router->map(
	'GET',
	'/user/login',
	[App\Controllers\AuthController::class, "showUserLoginForm"],
	'user.showlogin'
);
//Login
$router->map(
	'POST',
	'/user/login',
	[App\Controllers\AuthController::class, "loginUser"],
	'user.login'
);
//Logout User 
$router->map(
	'GET',
	'/user/logout',
	[App\Controllers\AuthController::class, "logoutUser"],
	'user.logout'
);
//Show Register Form
$router->map(
	'GET',
	'/user/register',
	[App\Controllers\AuthController::class, "showUserRegisterForm"],
	'user.showregister'
);
//Create User 
$router->map(
	'POST',
	'/user/register',
	[App\Controllers\AuthController::class, "createUser"],
	'user.create'
);

//Hiển thị trang checkout
$router->map(
	'GET',
	'/user/checkout',
	[App\Controllers\CheckoutController::class, "showCheckout"],
	'user.showcheckout'
);
//Checkout
$router->map(
	'POST',
	'/user/checkout',
	[App\Controllers\CheckoutController::class, "checkout"],
	'user.checkout'
);
//Trang lịch sử đơn hàng
$router->map(
	'GET',
	'/user/bill',
	[App\Controllers\BillController::class, "index"],
	'user.bill'
);
//Chi tiết đơn hàng
$router->map(
	'GET',
	'/user/bill/[a:id]',
	[App\Controllers\BillController::class, "detailBill"],
	'user.detailbill'
);
//Hủy đơn hàng
$router->map(
	'POST',
	'/user/bill/huy',
	[App\Controllers\BillController::class, "huyBill"],
	'user.huybill'
);

//Hiển thị trang Category
$router->map(
	'GET',
	'/category',
	[App\Controllers\CategoryController::class, "index"],
	'category'
);




$match = $router->match();

if ($match === false) {
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	exit('404 Not Found');
}

if (is_callable($match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else if (is_array($match['target'])) {
	$controller = new $match['target'][0];
	$action = $match['target'][1];
	if (is_callable([$controller, $action])) {
		call_user_func_array([$controller, $action], $match['params']);
	} else {
		header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error');
		exit('500 Internal Server Error');
	}
}
