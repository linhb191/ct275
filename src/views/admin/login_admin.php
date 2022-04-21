<?php
    if(isset($_SESSION['login-fail']))
    {
        echo $_SESSION['login-fail'];
        unset($_SESSION['login-fail']);
    }
?>

<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
                .login {
                    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
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
            .hieuunginput {
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
    </head>
    <body>
        <div class="login" style="min-height: 100%;">

            <div class="col py-md-3 py-2" id="content">
                <div class="mx-auto my-5 col-md-6 col-12 px-2 py-1 rounded-2">
                    <div class="mx-3 pb-2">
                        <h1 class="text-center mb-5">ĐĂNG NHẬP</h1>
                        <form class="my-2 mx-3 form_dangnhap" id="" action="<?= $router->generate('admin.login') ?>" method="POST">
                            <div class="mb-3">
                                <input type="text" name="username" placeholder="Tên đăng nhập" style="height: 45px;" class="form-control rounded-2 mb-xl-4 text-dark hieuunginput" id="username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" placeholder="Mật khẩu" style="height: 45px;" class="form-control rounded-2 text-dark hieuunginput" id="psw">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">Ghi nhớ mật khẩu cho lần sau</label>
                            </div>
                            <input type="submit" name="submit" value="Đăng nhập" style="height: 55px;" class="btn btn-success fw-bold text-dark  col-12 rounded-2 mt-lg-2">
                        </form>
                    </div>
                </div>
            </div>        
        </div>
    </body>
</html>
