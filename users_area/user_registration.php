<?php 
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');




?>


<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ElectraTech-Dz | Registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        

</head>


<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <!-- username field -->
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
        autocomplete="off" required="required" name="user_username"/>
    </div>
        <div class="form-group mb-4">
        <!-- email field -->
        <label for="user_email" class="form-label">Email</label>
        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" 
        autocomplete="off" required="required" name="user_email"/>
    </div>
        <div class="form-group mb-4">
        <!-- image field -->
        <label for="user_image" class="form-label">Image</label>
        <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
        </div>
        <div class="form-group mb-4">



        <!-- password field -->
<label for="user_password" class="form-label">Password</label>
<div class="input-group mb-3">
  <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
         autocomplete="off" required="required" name="user_password" oninput="checkPassword()"/>
</div>






        <div class="form-group mb-4">
        <!-- confirm password field -->
        <label for="conf_user_password" class="form-label">Confirm Password</label>
        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Your password" 
        autocomplete="off" required="required" name="conf_user_password"/>
    </div>
    <div class="form-group mb-4">
        <!-- address field -->
        <label for="user_address" class="form-label">Address</label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" 
        autocomplete="off" required="required" name="user_address"/>
    </div>
    <div class="form-group mb-4">
        <!-- Contact field -->
        <label for="user_contact" class="form-label">Contact</label>
        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Number Mobile" 
        autocomplete="off" required="required" name="user_contact"/>
    </div>
    <div class="mt-4 pt-2 ">
        <input  type="submit" value="Register" class="bg-warning py-2 px-3 border-0" name="user_register">
    </div>
    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
        <a class="text-danger" href="user_login.php"> Login</a></p>
</form>

            </div>    
        </div>
    </div>
</body>

<script>
  const passwordField = document.getElementById("user_password");
  const showPasswordButton = document.getElementById("show-password");
  
  // show/hide password function
  function togglePassword() {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    showPasswordButton.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
  }

  // event listeners
  passwordField.addEventListener('input', function() {
    const passwordValue = passwordField.value;
    if (passwordValue.length > 0) {
      showPasswordButton.style.display = "block";
    } else {
      showPasswordButton.style.display = "none";
    }
  });

  passwordField.addEventListener('focus', function() {
    const passwordValue = passwordField.value;
    if (passwordValue.length > 0) {
      showPasswordButton.style.display = "block";
    }
  });

  passwordField.addEventListener('blur', function() {
    showPasswordButton.style.display = "none";
  });

  showPasswordButton.addEventListener('mousedown', function() {
    togglePassword();
  });
</script>

</html>


<!-- php code -->
<?php

if(isset($_POST['user_login'])){
    $user_name=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $user_ip=getIPAddress();

    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    // cart item 
    $select_query_cart="SELECT * FROM `user_table` WHERE username='$user_name'";
    $result_cart=mysqli_query($con,$select_query_cart);
    $rows_count_cart=mysqli_num_rows($result_cart);

    if($rows_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            if($rows_count==1 and $rows_count_cart==0 ){
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
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

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
     // select query
     $select_query="SELECT * FROM `user_table` WHERE username='$user_username'or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
        // insert_query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="INSERT into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
                        values  ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
    }

    // SELECTING CART ITEMS
    $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>



