<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
	public function showAdminLoginForm()
	{
		global $router;

		view('admin/login_admin', [
			'router' => $router
		]);
	}

	public function loginAdmin()
	{
		global $router;
		$username = $_POST['username'];
		$pass = $_POST['password'];
		if($username == "admin" && $pass == "admin")
		{
			//Đăng nhập thành công
			$_SESSION['admin'] = $_POST['username'];
			redirect(
				$router->generate(
					'admin.home'	
				)
			);
		}
		else
		{
			//Đăng nhập thất bại
			$_SESSION['login-fail'] = "<script>alert('Sai tên đăng nhập hoặc mật khẩu.')</script>";
			redirect(
				$router->generate(
					'admin.showlogin'	
				)
			);
		}

		
		
	}

	public function logoutAdmin()
	{
		unset($_SESSION['admin']);
		redirect('/admin');
	}


	public function showUserLoginForm()
	{
		global $router;

		view('login', [
			'router' => $router
		]);
	}

	public function loginUser()
	{
		global $router;
		$username = $_POST['username'];
        $password = md5($_POST['password']);
		$user = User::where('username',$username)->where('password',$password)->first();
	
		if(!empty($user))
		{
			//echo print_r($user);
			$_SESSION['user'] = $username;
			if(isset($_SESSION['thongtindathang']))
			{
				redirect(
					$router->generate(
						'user.showcheckout'	
					)
				);
			}
			else
			{
				redirect(
					$router->generate(
						'home'	
					)
				);
			}
				
			
		}
		else
		{
			
			$_SESSION['user-login'] = "<script>alert('Sai tên đăng nhập hoặc mật khẩu.')</script>";
			redirect(
				$router->generate(
					'user.showlogin'	
				)
			);
		}
	}
	public function logoutUser()
	{
		global $router;
		unset($_SESSION['user']);
		redirect(
				$router->generate(
					'home'	
				)
			);
	}

	public function showUserRegisterForm()
	{
		global $router;

		view('register', [
			'router' => $router
		]);
	}

	public function createUser()
	{
		global $router;

		$username = $_POST['username'];
		$user = User::where('username', $username)->first();
		if(!empty($user))
		{
			$_SESSION['register'] = "<script>alert('Username đã được sử dụng.')</script>";
			redirect(
				$router->generate(
					'user.showregister'	
				)
			);
		}
		else
		{
			$password = md5($_POST['password']);
            $repassword = md5($_POST['repassword']);
            $fullname = $_POST['fullname'];
            $mobile = $_POST['sdt'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            if($password==$repassword){
               
                $create = User::create([
					'username' => $username,
					'password' => $password,
					'fullname' => $fullname,
					'mobile' => $mobile,
					'address' => $address,
					'email' => $email
				]);
				if($create == true)
				{
					$_SESSION['username'] = $username;
					
					redirect(
						$router->generate(
							'user.showlogin'	
						)
					);
				}
                
                

            }else{
                $_SESSION['register'] = "<script>alert('Mật khẩu không trùng khớp.')</script>";
				redirect(
					$router->generate(
						'user.showregister'	
					)
				);
            }
		}
	}


}
