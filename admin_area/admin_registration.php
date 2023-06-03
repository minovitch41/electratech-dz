
<?php
    include ('../includes/connect.php');
    include('../functions/common_function.php');
    

    if(isset($_POST['user_register'])){
        $username = mysqli_real_escape_string($con,$_POST['user_username']);
        $email = mysqli_real_escape_string($con,$_POST['user_email']);
        $password = mysqli_real_escape_string($con,$_POST['user_password']);
        $confirm_password = mysqli_real_escape_string($con,$_POST['confirm-password']);
    
        if(empty($username) || empty($email) || empty($password) || empty($confirm_password)){
            echo "<script>alert('All fields are required')</script>";
            exit();
        }
    
        if($password !== $confirm_password){
            echo "<script>alert('Passwords do not match')</script>";
            exit();
        }
    
        $query = "SELECT * FROM admin_table WHERE admin_email='$email'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
    
        if($rows > 0){
            echo "<script>alert('Email already exists. Please use another email')</script>";
            exit();
        }
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $insert_query = "INSERT INTO `admin_table` (admin_name,admin_email,admin_password) VALUES ('$username','$email','$hashed_password')";
        $insert_result = mysqli_query($con, $insert_query);
    
        if($insert_result){
            echo "<script>alert('Registration successful. Please login to continue')</script>";
            echo "<script>window.open('./admin_login.php','_self')</script>";

        } else {
            echo "<script>alert('Registration failed. Please try again.')</script>";
        }
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
    background-color: #F5F5F5;
}
.form-container {
    margin-top: 50px;
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px #C4C4C4;
}

    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-3 m-auto">Admin Registration</h2>
    <div class="row">
        <div class="col-lg-6 col-xl-5 m-auto">
            <img src="../images/adminreg.jpg" alt="admin Registration" class="img-fluid float-left">
        </div>
        <div class="col-lg-6 col-xl-5">
            <div class="form-container float-right mx-auto">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                    <label for="user_email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email address">
                    </div>
                    <div class="mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password">
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-primary"value="Register" name="user_register">
                    </div>
                    <div class="mt-3 mb-5 text-center">
                    <p class="small">Already have an account?
                    <a href="admin_login.php" class="link-danger"><strong>Log in here</strong></a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-bbaLpNtUV9jW/3qf3B4/4pTMBwjcLzFfT13TjrnzIemxMx9MQsQhebZnMWBxdjWG" 
    crossorigin="anonymous"></script>

    </body>
</html>

