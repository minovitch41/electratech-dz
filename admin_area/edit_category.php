<?php 
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    
    $get_categories="SELECT * FROM `categories` WHERE `category_id`=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
    
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];

    $update_query="UPDATE `categories` SET `category_title`='$cat_title' WHERE `category_id`='$edit_category'";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category has been updated')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}




?>



<div class="container mt-3">
    <h1 class="text-center" >Edit Category</h1>
    <form action="" method="post" class="text-center">
    <div class="form-outline  mb-4  w-50 m-auto ">
        <label for="category_title" class="from-label"><h3 class='text-danger'>Category Title</h3></label>
        <input type="text" name="category_title" id="category_title" class="form-control text-center w-50 m-auto" value="<?php echo $category_title ?>" required="required">
    </div>
    <input type="submit" class="btn btn-warning px3 mb-3" value="Update Category" name="edit_cat">
    </form>
</div>