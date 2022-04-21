<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shop Food</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        
        <style>
            a{
                text-decoration: none;
            }
            .padding-1{
                padding-right:5px;
                padding-left:5px;
            }
            .padding-0{
                padding-right:0;
                padding-left:0;
            }
            li a {
                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
                }

            /* Change the link color on hover */
            li:hover {
                
                background-color: #ffb3b3;
                
            }
        </style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="/images/logo.png" class="" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item px-1" id="home_active">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item px-1" id="food_active">
                        <a class="nav-link" href="/food">Foods</a>
                        </li>
                        <li class="nav-item px-1" id="category_active">
                        <a class="nav-link" href="/category">Categories</a>
                        </li>
                        <li class="nav-item px-1" id="cart_active">
                        <a class="nav-link" href="/cart">Cart</a>
                        </li>
                        <?php
                        if(isset($_SESSION['user']))
                        {
                            ?>
                            <li class="nav-item px-1" id="bill_active">
                                <a class="nav-link" href="/user/bill">Lịch sử đơn hàng</a>
                            </li>
                            <li class="nav-item px-1 ">
                                <a class="nav-link" href="/user/logout"><i class='fas fa-user-check' style='font-size:20px'></i> Logout</a>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li class="nav-item px-1">
                                <a class="nav-link" href="/user/login">Login</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="nav-link" href="/user/register">Register</a>
                            </li>
                            <?php
                        }
                        ?>
                        
                        
                        
                    </ul>
                    </div>
                </div>
                </nav>