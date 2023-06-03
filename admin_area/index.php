<!-- connect file -->
<?php 
include ('../includes/connect.php');
    include('../init.php');
    include('../functions/common_function.php');
    session_start();

    if (!isset($_SESSION['username'])) {
        // Redirect the user to the login page
        header('Location: admin_login.php');
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ADmin Dashabord</title>

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
        <style >
            .admin_image {
                            width: 100px;
                            object-fit: contain; }

            .footer {
                position:absolute;
                bottom:0;

            }
            body{overflow-x: hidden;}
            .product_img{width:100px; object-fit: contain;}
       </style>
</head>
<body>


                    <!-- nav Bar-->
            <div class="container-fluid p-0">
                <!--F1 CHILD -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                            <div class="container-fluid">
                                <img src="../images/Logo.png" alt="" class="logo">
                                <nav class="navbar navbar-expand-lg ">

                                        <ul class="navbar-nav">
                                            <?php
                                            if(isset($_SESSION['username'])){ 
                                            echo "<li class='nav-item'>
                                            <a class='nav-link' href='#'>My Account</a>
                                            </li>"; }
                                            ?>
                                        </ul>

                                </nav>
                            </div>
                    </nav>
                    <!--S2 CHILD -->
                    <div class="bg-light">
                        <h3 class="text-center bg">Manage Details</h3>

                    </div>
                    <!-- S3 CHILD -->
                    <div class="row">
    <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="./admin.jpg" alt="" class="admin_image"></a>
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                    <a class='nav-link ' href='#'> Welcome Guest</a>
                </li>";
            } else {
                echo "<li class='nav-item'>
                    <a class='nav-link ' href='#'><b class='text-warning'>".$_SESSION['username']."</b></a>
                </li>";
            }
            ?>
        </div>
        <!-- button*10>a.nav-link.text-ligt.bg-info.my-1 -->
        <div class="button text-center">
        <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-warning my-1">Insert Proudcuts</a></button>
        <button><a href="index.php?view_products" class="nav-link text-dark bg-warning my-1">View Products</a></button>
        <button><a href="index.php?insert_category" class="nav-link text-dark bg-warning my-1">Insert Categories</a></button>
        <button><a href="index.php?view_categories" class="nav-link text-dark bg-warning my-1">View Categories</a></button>
        <button><a href="index.php?insert_brand" class="nav-link text-dark bg-warning my-1">Insert Brands</a></button>
        <button><a href="index.php?view_brands" class="nav-link text-dark bg-warning my-1">View Brands</a></button>
        <button><a href="index.php?list_orders" class="nav-link text-dark bg-warning my-1">All Orders</a></button>
        <button><a href="index.php?list_payments" class="nav-link text-dark bg-warning my-1">All payments</a></button>
        <button><a href="index.php?list_users" class="nav-link text-dark bg-warning my-1">List Users</a></button>
        <button><a href="index.php?logout" class="nav-link  text-danger bg-warning my-1"><b>Logout</b></a></button>
        
        </div>
    </div>

</div>
</div>
                <!-- Forth child --> 
            <div class="container my-3">
                <?php 
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                include('edit_products.php');
                }
                if(isset($_GET['delete_product'])){
                include('delete_product.php');
                }
                if(isset($_GET['view_categories'])){
                include('view_categories.php');
                }
                
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                include('edit_category.php');
                }
                if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
                }
                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                    }
                
                if(isset($_GET['delete_category'])){
                        include('delete_category.php');
                        }
                
                if(isset($_GET['list_orders'])){
                            include('list_orders.php');
                            }
                if(isset($_GET['list_payments'])){
                            include('list_payments.php');
                                }
                if(isset($_GET['list_users'])){
                            include('list_users.php');
                                        }
                                
                        
                if(isset($_GET['logout'])){
                            include('logout.php');
                                                }
                ?>
            </div>

        <!-- last Child -->


        <!-- last Child -->
  <div class="bg-dark p-4 text-center">
    <p class="Copy">All Copy Right Reserved &copy; 2023 Algeria (Univ-batna2)<br>Desgined By <sub>+</sub><strong>Khemissi.Moe</strong><sup>+</sup> ISIL-341- </p>
  </div>




























