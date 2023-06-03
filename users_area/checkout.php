<?php

    
    include ('../includes/connect.php');
    include('../init.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ElectraTech-Dz | Checkout page </title>

    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">

        
        <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--Css File -->
        <link rel="stylesheet"  href="../style.css">
        </head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
            <img src="../images/Logo.png" alt=""  class="logo" href="../index.php">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="../index.php">ElectraTech-Dz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-warning" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

                        
        <!-- second child -->

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
        <a class='nav-link' href='user_login.php'> Login</a>
    </li>";
} else {
    echo "<li class=\"nav-item\">
        <a class='nav-link' href='logout.php'>Logout</a>
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
    <div class="col-md-12 ">
        <!-- Products -->
        <div class="row">

            <?php
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            }else {
                include('payment.php');
            }
            ?>
        </div>
        <!-- Col end -->
    </div>
    
    </div>
</div>
            <!-- last Child -->
  <div class="bg-dark p-4 text-center">
    <p class="Copy text-light">All Copy Right Reserved &copy; 2023 Algeria (Univ-batna2)<br>Desgined By <sub>+</sub><strong>Khemissi.Moe</strong><sup>+</sup> ISIL-341- </p>
  </div>


<!-- js bootstrap Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>    
</body>
</html>