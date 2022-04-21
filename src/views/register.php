<?php
    if(isset($_SESSION['register']))
    {
        echo $_SESSION['register'];
        unset($_SESSION['register']);
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
    .dangky {
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
    #username, #psw, #address {
	background: linear-gradient(-45deg, #ee7752, #ffffb3, #ccffcc, #ff99c2);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: auto;
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

<div class="row dangky">
    <div class="container">
       <div class="col py-md-3 py-2" id="content">
                <div class="mx-auto col-md-6 col-12 px-2 py-1 rounded-2">
                    <div class="mx-3 pb-2 pt-4">
                        <div class="text-center mb-md-4 mb-2">
                            <h1>ĐĂNG KÝ THÀNH VIÊN</h1>
                            
                            
                        </div>
                        <form class="my-2 mx-3" action="<?= $router->generate('user.create') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="username" placeholder="Tên đăng nhập" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" name="password" placeholder="Mật khẩu" style="height: 45px;" class="form-control rounded-2 text-dark" id="psw">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" style="height: 45px;" class="form-control rounded-2 text-dark" id="psw">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="fullname" placeholder="Họ và tên" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark" id="username" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <input type="email" name="email" placeholder="Nhập email" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="sdt" placeholder="Số điện thoại" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                        <textarea class="form-control" name="address" id="address" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 115px"></textarea>
                                        <label for="floatingTextarea2">Địa chỉ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="dangky" style="height: 55px;" class="btn btn-success fw-bold text-dark  col-12 rounded-2 mt-lg-2">ĐĂNG KÝ</button>

                            <div class="row mx-auto mt-2">
                                <div class="col-12 text-center" style="font-size: 20px;">
                                    Đã có tài khoản?<a href="/user/login" class="link-success" style="text-decoration: none;"> Đăng nhập!</a>
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
</body>
</html>