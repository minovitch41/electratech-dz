<?php 
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    
    $get_brands="SELECT * FROM `brands` WHERE `brand_id`=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    
}

if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brand_title'];

    $update_query="UPDATE `brands` SET `brand_title`='$brand_title' WHERE `brand_id`='$edit_brand'";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('Brand has been updated')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center" >Edit Brand</h1>
    <form action="" method="post" class="text-center">
    <div class="form-outline  mb-4  w-50 m-auto ">
        <label for="brand_title" class="from-label"><h3 class='text-danger'>Brand Title</h3></label>
        <input type="text" name="brand_title" id="brand_title" class="form-control text-center w-50 m-auto" value="<?php echo $brand_title ?>" required="required">
    </div>
    <input type="submit" class="btn btn-warning px3 mb-3" value="Update Brand" name="edit_brand">
    </form>
</div>
