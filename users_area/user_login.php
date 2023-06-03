<?php

include('../includes/connect.php');
include('../functions/common_function.php');

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
    <title>ElectraTech-Dz | Login</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <!-- style css -->
    <style>body{ overflow-x:hidden; }</style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="form-group mb-4">
                    <!-- username field -->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
                    autocomplete="off" required="required" name="user_username"/>
                </div>
                <div class="form-group mb-4">
                    <!-- password field -->
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                    autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="form-group mb-4">
                    <div class="mt-4 pt-2 ">
                        <input  type="submit" value="Login" class="bg-warning py-2 px-3 border-0" name="user_login">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                        <a class="text-danger" href="user_registration.php"> Register</a>
                    </p>
                </div>
            </form>
            </div>    
        </div>
    </div>
</body>
</html>


<?php 

if(isset($_POST['user_login'])){
    $user_username=mysqli_real_escape_string($con, $_POST['user_username']);
    $user_password=mysqli_real_escape_string($con, $_POST['user_password']);

    // Check if user exists in user_table
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($rows_count>0){
        $_SESSION['username']=$user_username;
        // Verify password
        if(password_verify($user_password,$row_data['user_password'])){
            // Redirect to appropriate page based on user cart status
            $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='".getIPAddress()."'";
            $result_cart=mysqli_query($con,$select_query_cart);
            $rows_count_cart=mysqli_num_rows($result_cart);

            if($rows_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?> 
