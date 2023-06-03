<?php
    include ('../includes/connect.php');
    include('../init.php');
    include('../functions/common_function.php');
    session_start();
    
    
    


?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Welcome <?php echo  $_SESSION['username'] ?></title>

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
        <style>
            body{overflow-x:hidden; }
            .profile_img{width: 90%; height: 100%; margin: auto; display: block;object-fit:contain; }
            .edit_image{width: 100px; height: 100px;object-fit:contain; }
        </style>
        </head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
            <img src="../images/Logo.png" alt=""  class="logo" href="index.php">
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
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart "></i><sup ><b class="text-warning"> <?php cart_item(); ?></b></sup></a>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <b class="text-warning">Total Price: <?php total_cart_price(); ?> DZ</b></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-warning" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

                        <!-- get calling cart function -->
                        <?php cart(); ?>
        
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
        <a class='nav-link' href='./users_area/user_login.php'> Login</a>
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
        </div>
            <!-- forth child -->
            <div class="row">
                <div class="col-md-2 ">
                <ul class="navbar-nav bg-secendary text-center" >
                <li class="nav-item bg-dark">
                            <a class="nav-link text-warning"  href="#"><h4>Your Profile</h4></a>
                        </li>

                    <?php 
                    
                        $username=$_SESSION['username'];
                        $user_image="SELECT *FROM `user_table` WHERE username='$username'";
                        $result_image=mysqli_query($con,$user_image);
                        $row_image=mysqli_fetch_array($result_image);
                        $user_image=$row_image['user_image'];
                        echo "<li class='nav-item bg-dark'>
                                <img src='./user_images/$user_image'class='profile_img my-4' alt=''>
                                </li>"; 
                    ?>
                <li class="nav-item bg-dark">
                            <a class="nav-link text-light"  href="profile.php">Pending orders</a>
                        </li>
                <li class="nav-item bg-dark">
                            <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
                        </li>
                <li class="nav-item bg-dark">
                            <a class="nav-link text-light"  href="profile.php?my_orders">My orders</a>
                        </li>
                <li class="nav-item bg-dark">
                            <a class="nav-link text-danger"  href="profile.php?delete_account">Delete Account</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link text-light"  href="logout.php"><h6>Logout</h6></a>
                        </li>
                </ul>
                </div>
                <div class="col-md-10 text-center">
                    <?php
                    get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                    ?>
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