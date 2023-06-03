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
    
    <title>ElectraTech-Dz | Cart Details </title>

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
        <style>
        .cart_img {
    width: 80px;
    height: 80px;
    object-fit: contain;
            }
.bold-link {
    font-weight: bold;
    }
  </style>
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
                        
                    </ul>
                    
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
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li>";
}
?>
    </ul>
</nav>


        <!--third Child -->
        <div class="bg-light">
            <h3 class="text-center"> Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>

            <!-- Fourth Child-table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    <table class="table table-bodered text-center">
                        
                            <!-- php code to display dynamic data -->
                            <?php
$get_ip_add = getIPAddress();
$total_price=0;
$cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
    echo "<thead>
    <tr>
        <th>Product title</th>
        <th>Product image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
    </tr>
</thead>
<tbody>";


while ($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while ($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image1=$row_product_price['product_image1'];
        $product_quantity = $row['quantity'];
        $product_values=array_sum($product_price);//[500]
        $total_price+=$product_values;//500
?>
<tr>
    <td><?php echo $product_title?></td>
    <td><img class="cart_img" src="./images/<?php echo $product_image1?>" alt=""></td>
    <td><input type="number" name="qty" class="from-control w-50" min="0" value="<?php echo $product_quantity ;?>"></td>
    <?php
    if(isset($_POST['update_cart'])){
        $quantites = $_POST['qty'];
        $update_cart = "UPDATE `cart_details` SET quantity=$quantites WHERE
        ip_address='$get_ip_add'";
        $result_products_quantity=mysqli_query($con,$update_cart);
        $total_price=$total_price*$quantites;
    
        
            }
        
    ?>




    <td><?php echo $price_table?> DZ</td>
    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
    <td>
        <input type="submit" value="Update Cart" class="bg-warning p-3 py-2 border-0 mx-3" name="update_cart">
        <!-- <button class="bg-warning p-3 py-2 border-0 mx-3">Remove</button> -->
        <input type="submit" value="Remove Cart" class="bg-warning p-3 py-2 border-0 mx-3" name="remove_cart">

    </td>
</tr>

<?php
}}} 
else {
    echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
}
?>
    </tbody>
</table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <?php $get_ip_add = getIPAddress();

$cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
    echo "<h4 class='px-3'>Subtotal:<strong class='text-warning'> $total_price DZ</strong> </h4>
    <input type='submit' value='Continue Shopping ' class='bg-warning p-3 py-2 border-0 mx-3' style='font-weight:bold; name='continue_shopping'>
    <button class='bg-secondary p-3 py-2 border-0  '><a href='./users_area/checkout.php' class='text-light text-decoration-none bold-link '>Checkout</a></button>";
}
else {
    echo "<input type='submit' value='Continue Shopping ' class='bg-warning p-3 py-2 border-0 mx-3' name='continue_shopping'>";
}

if (isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
}
?>

    
                    
                    </div>
                    
                    </form>
                </div>
            </div>
            
            <!-- function to remove item -->
            <?php
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete  from `cart_details` where product_id=$remove_id ";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=remove_cart_item();
            ?>
            


            <?php include $tpl .'Backend.php'; ?>