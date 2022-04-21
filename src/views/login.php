<?php
    if(isset($_SESSION['username']))
    {
        echo "<script>alert('Đăng ký tài khoản thành công.')</script>";
    }
    if(isset($_SESSION['user-login']))
    {
        echo $_SESSION['user-login'];
        unset($_SESSION['user-login']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
    <style>
    .login {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 700px;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    #username, #psw {
	background: linear-gradient(-45deg, #ee7752, #ffffb3, #ccffcc, #ff99c2);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100%;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
    </style>
<div class="row login" >
    <div class="container mt-5">
        <div class="col py-md-3 py-2" id="content">
                <div class="mx-auto col-md-6 col-12 px-2 py-1 rounded-2">
                    <div class="mx-3 py-2" >
                        <div class="text-center mb-md-4 mb-2">
                            <h1>ĐĂNG NHẬP</h1>
                            <br>
                            <p style="color: red;"><?php if(isset($alert)){echo $alert;}?></p>
                        </div>
                        <form class="my-2 mx-3 form_dangnhap" action="<?= $router->generate('user.login') ?>" method="POST" >
                            <div class="mb-3">
                                <input <?php if(isset($_SESSION['username'])){?>value="<?php echo $_SESSION['username'];?>" <?php unset($_SESSION['username']);}?> type="text" name="username" placeholder="Tên đăng nhập" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark" id="username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" placeholder="Mật khẩu" style="height: 45px;" class="form-control rounded-2 text-dark" id="psw">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">Ghi nhớ mật khẩu cho lần sau</label>
                            </div>
                            <button type="submit" name="dangnhap" style="height: 55px;" class="btn btn-success fw-bold text-dark  col-12 rounded-2 mt-lg-2">ĐĂNG NHẬP</button>
                            <div style="text-align: center; margin-top: 15px;">Hoặc</div>
                            <div class="row mx-auto">
                                <div class="col-12 text-center">
                                    Không có tài khoản?<a href="/user/register" class="link-success" id="linkdky"> Đăng ký!</a>
                                </div>
                                <div class="col-12 text-center mt-1">
                                    <a href="#" class="link-success">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

</div>
<div class="text-center row p-2 mx-auto text-center">
                   <p>© 2021 Copyright: Vu Linh developer</p> 
        </div>
    </div>
    
    </div>
</body>
</html>