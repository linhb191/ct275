<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Food;

class CartController
{
    

	public function index()
	{
		global $router;
        $giohang = null;
        if(isset($_SESSION['giohang']))
        {
            $giohang = $_SESSION['giohang'];
        }
		view('cart', [
			'foods' => $giohang,
			'router' => $router
		]);
	}
    public function addCart()
    {
        global $router;
        if(!isset($_SESSION['giohang'])){        
            $_SESSION['giohang'] = []; 
            $tongtien = 0;
        }

        $hinh = $_POST['hinh'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $thanhtien = $_POST['gia']*$_POST['soluong'];
        $tongtien = $tongtien + $thanhtien;
        //Kiểm tra sản phẩm có trong giỏ hàng hay không
        $fl = 0;
        for($i=0; $i < sizeof($_SESSION['giohang']);$i++){
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew = $soluong + (int)$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3] = $soluongnew;
                $_SESSION['giohang'][$i][4] = $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2];
                
                break;
            }
        }
        //Thêm mới sản phẩm vào giỏ hàng
        if($fl==0){
            $sp = [$hinh,$tensp,$gia,$soluong,$thanhtien];
            $_SESSION['giohang'][] = $sp;
        }
        redirect(
			$router->generate(
				'cart',
			)
		);
    }
    public function deleteSanPham($id)
    {
        global $router;

        //Xóa sản phẩm trong giỏ hàng
        if( $id >= 0 ){
            array_splice($_SESSION['giohang'],$id,1);
            redirect(
                $router->generate(
                    'cart',
                )
		    );
        }
    }
    public function deleteCart()
    {
        global $router;
        //Làm rỗng giỏ hàng
        if(!empty($_SESSION['giohang']))
        {
            unset($_SESSION['giohang']);
        }
        redirect(
                $router->generate(
                    'cart',
                )
		    );
            
        
    }
    

}