<?php

namespace App\Controllers;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class BillController
{
    

	public function index()
	{
		global $router;
		view('lichsudathang', [
            'bills' => Bill::where('taikhoan',$_SESSION['user'])->orderBy('ngaydat', 'desc')->get(),
			'router' => $router
		]);
	}
	public function detailBill($id)
    {
        global $router;
        view('detail_bill', [
            'bill' => Bill::where('id',$id)->first(),
            'foods' => Cart::where('idbill', $id)->get(),
			'router' => $router
		]);
    }
    public function huyBill()
    {
        global $router;
        $id_bill = $_POST['id_bill'];
        $bill = Bill::where('id',$id_bill)->first();
        if($bill->status == 0)
        {
            $bill->status = 4;
            $bill->save();
            $_SESSION['huy-bill'] = "<script>alert('Hủy đơn hàng thành công.');</script>";            
            redirect("/user/bill/".$bill->id);

        }
        else
        {
            $_SESSION['huy-bill'] = "<script>alert('Không thể hủy đơn hàng thành công. Đơn hàng đã được xử lý.');</script>";            
            redirect("/user/bill/".$bill->id);
        }
        
    }

}