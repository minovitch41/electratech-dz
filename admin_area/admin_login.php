<?php
include ('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

if(isset($_POST['admin_login'])){
    $user_username=mysqli_real_escape_string($con, $_POST['user_username']);
    $admin_password=mysqli_real_escape_string($con, $_POST['user_password']);

    // Check if user exists in user_table
    $select_query="SELECT * FROM `admin_table` WHERE `admin_name`='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($rows_count>0){
        $_SESSION['username']=$user_username;
        // Verify password
        if(password_verify($admin_password,$row_data['admin_password'])){
            // Redirect to appropriate page
            header("Location: index.php");
            exit();
        }else{
            $error = "Invalid Credentials";
        }
    }else{
        $error = "Invalid Credentials";
    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    <h2 class="text-center mb-3 m-auto">Admin Login</h2>
    <div class="row">
        <div class="col-lg-6 col-xl-5 m-auto">
            <img src="../images/login.png" alt="admin Registration" class="img-fluid float-left">
        </div>
        <div class="col-lg-6 col-xl-5">
            <div class="form-container float-right mx-auto">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="user_username" class="form-label">username</label>
                        <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter your username">
                    </div>
                    
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password">
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-primary"value="Login" name="admin_login">
                    </div>
                    
                    <div class="mt-3 mb-5 text-center">
                        <p class="small">Don't have an account?
                        <a href="admin_registration.php" class="link-danger"><strong>Register</strong></a></p>
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