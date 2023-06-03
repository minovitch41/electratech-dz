<?php
    include ('includes/connect.php');
    include ('init.php');
    include('functions/common_function.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ElectraTech-Dz </title>

    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">

        
        <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--Css File -->
        <link rel="stylesheet"  href="style.css">
        <style>body{ overflow-x:hidden }</style>
        </head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
            <img src="./images/Logo.png" alt=""  class="logo" href="index.php">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="index.php">ElectraTech-Dz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){ 
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        }else{
                            echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart "></i><sup ><b class="text-warning"> <?php cart_item(); ?></b></sup></a>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <b class="text-warning">Total Price: <?php total_cart_price(); ?> DZ</b></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="get" >
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-warning" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- get calling cart function -->
        <?php cart(); ?>
    

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <ul class="navbar-nav me-auto">
        
        <?php
if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
        <a class='nav-link ' href='#'>  Welcome Guest</a>
    </li>";
} else {
    echo "<li class='nav-item'>
        <a class='nav-link ' href='#'>  Welcome <b class='text-warning'>".$_SESSION['username']."</b></a>
    </li>";
}

if(!isset($_SESSION['username'])){
    echo "<li class=\"nav-item\">
        <a class='nav-link' href='./users_area/user_login.php'> Login</a>
    </li>";
} else {
    echo "<li class=\"nav-item\">
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li>";
}
?>
    </ul>
</nav>


        <!--third Child -->
        <div class="bg-light">
            <h3 class="text-center"> ElectraTech-Dz</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>

            <!-- Fourth Child -->
            <div class="row px-1">
    <div class="col-md-10 order-md-1">
        <!-- Products -->
        <div class="row">

        <!-- fetching proudcuts -->


        <?php 

    // Calling function

    search_product();
    get_unique_categories();
    get_unique_brands();
    ?> 
        </div>
        <!-- Col end -->
    </div>
    <div class="col-md-2 order-md-2  bg-secondary p-0">
        <!-- Side Navigation -->
        <!-- brands to be Displayed  -->
        <ul class="navbar-nav ne-auto text-center">
            <li class="nav-item bg-warning">
                <a class="nav-link text-dark" href="#"><h4>Delivery Brands</h4></a>
            </li>
            <?php
            getbrands();
            ?>
        </ul>
        <!-- Categories To be Displayed -->
        <ul class="navbar-nav ne-auto text-center">
            <li class="nav-item bg-warning">
                <a class="nav-link text-dark" href="#"><h4>Categories</h4></a>
            </li>
            <?php
            get_categories() ;
            ?>
        </ul>
    </div>
</div>
            <?php include $tpl .'Backend.php'; ?>