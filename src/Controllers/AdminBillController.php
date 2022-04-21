<?php

namespace App\Controllers;

use App\Models\Bill;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class AdminBillController
{
	public function index()
	{
        global $router;
        view('admin/admin_bill', [
            'bills' => Bill::orderBy('ngaydat', 'desc')->get(),
			'router' => $router
		]);
    }
    public function detailBill($id)
    {
        global $router;
        view('admin/admin_detail_bill', [
            'bill' => Bill::where('id',$id)->first(),
            'foods' => Cart::where('idbill', $id)->get(),
			'router' => $router
		]);
    }
    public function updateBill()
    {
        global $router;
        $id_bill = $_POST['id_bill'];
        $status = $_POST['status'];
        $bill = Bill::where('id',$id_bill)->first();
        $bill->status = $status;
        $bill->save();
        redirect(
			$router->generate(
				'admin.showbill',	
			)
		);
    }
    
    public function deleteBill($id)
	{
		global $router;
        
        $bill = Bill::find($id);
        if($bill->status == 4)
        {
            $bill->delete();
            $_SESSION['delete-bill'] = "<script>alert('Xóa đơn hàng thành công.');</script>";
            redirect(
                $router->generate(
                    'admin.showbill'	
                )
		    );
        }
        else
        {
            $_SESSION['delete-bill'] = "<script>alert('Không thể xóa đơn hàng. Vì đơn hàng chưa được xử lý.');</script>";
            redirect(
                $router->generate(
                    'admin.showbill'	
                )
		    );
        }

	}

}