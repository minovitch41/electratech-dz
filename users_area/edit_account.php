<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}

if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    
    $update_data="UPDATE `user_table` SET `user_email`='$user_email',`user_image`='$user_image',`user_address`='$user_address',`user_mobile`='$user_mobile' ,`username`='$username' WHERE `user_id`='$update_id'";
    $result_query_update=mysqli_query($con,$update_data);
    
    if($result_query_update){
        echo "<script>alert('Account Updated Successfully.')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>
<body>
    <h3 class="text-success mb-4"> Edit account </h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <label for="username">Username:</label>
        <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo $username; ?>" required>
    </div>
    <div class="form-outline mb-4">
        <label for="email">Email:</label>
        <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email; ?>" required>
    </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto " >
            <input type="file" class="form-control m-auto " name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" class="edit_image" alt="">
        </div>
    <div class="form-outline mb-4">
        <label for="address">Address:</label>
        <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address; ?>" required>
    </div>
    <div class="form-outline mb-4">
        <label for="mobile">Mobile:</label>
        <input type="text" class="form-control w-50 m-auto " name="user_mobile" value="<?php echo $user_mobile; ?>" required>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="submit" class="btn btn-primary" name="user_update" value="Update Account">
</form>

</body>
<html>
