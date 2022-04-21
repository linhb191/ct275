<?php

namespace App\Controllers;

use App\Models\Bill;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class CheckoutController
{
    

	public function showCheckout()
	{
		global $router;
        $giohang = null;
        if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang']))
        {
            $giohang = $_SESSION['giohang'];
            view('checkout', [
			'foods' => $giohang,
			'router' => $router
		    ]);
        }
        else
        {
            $_SESSION['cart-empty'] = "<script>alert('Giỏ hàng rỗng.')</script>";
            redirect(
			$router->generate(
				'cart',
			)
		);
        }
		
	}
    public function checkout()
    {
        global $router;
        if(isset($_SESSION['user']))
        {
            $name = $_POST['hoten'];
            $address = $_POST['diachi'];
            $tel = $_POST['sdt'];
            $email = $_POST['email'];
            $pttt = 0;
            $total = $_POST['total'];
            // date_default_timezone_set('Asia/Ho_Chi_Minh');
            // $ngaydat = date("d/m/y h:i:s A",time());
            if(isset($_SESSION['user'])){
                $taikhoan = $_SESSION['user'];
            }
            //Tạo đơn hàng
            
            $createbill = Bill::create([
                'taikhoan' => $taikhoan,
                'name' => $name,
                'address' => $address,
                'tel' => $tel,
                'email' => $email,
                'total' => $total,
                'pttt' => $pttt,
                //'ngaydat' => $ngaydat,
                'status' => '0'
            ]);

            $idbilll = $createbill->id;
            

            //Lấy thông tin giỏ hàng từ session và id đơn hàng vừa tạo
            //Insert vào bảng giỏ hàng
            
            for($i=0;$i<sizeof($_SESSION['giohang']);$i++){
                $tensp = $_SESSION['giohang'][$i][1];
                $hinhsp = $_SESSION['giohang'][$i][0];
                $dongia = $_SESSION['giohang'][$i][2];
                $soluong = $_SESSION['giohang'][$i][3];
                $thanhtien = $dongia*$soluong;
                if($createbill == true)
                {
                    $cart = Cart::create([
                        'tensp' => $tensp,
                        'hinhsp' => $hinhsp,
                        'dongia' => $dongia,
                        'soluong' => $soluong,
                        'thanhtien' => $thanhtien,
                        'idbill' => $idbilll
                    ]);
                }
                
            }
            unset($_SESSION['giohang']);
            unset($_SESSION['thongtindathang']);
            $_SESSION['checkout'] = "<script>alert('Đặt hàng thành công.')</script>";
            redirect(
			$router->generate(
				'cart',
			)
		);
        }
        else
        {
            $name = $_POST['hoten'];
            $address = $_POST['diachi'];
            $tel = $_POST['sdt'];
            $email = $_POST['email'];
            $pttt = 0;
            //  echo "Bạn chưa đăng nhập";
            $thongtin = [$name,$address,$tel,$email,$pttt];
            $_SESSION['thongtindathang'][] = $thongtin; 
            redirect(
			$router->generate(
				'user.showlogin',
			)
		);
            
        }

    }
}