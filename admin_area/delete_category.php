<?php
if(isset($_GET['delete_category'])){
    $delete_category_id=$_GET['delete_category'];
    
    $get_category="SELECT * FROM `categories` WHERE `category_id`=$delete_category_id";
    $result=mysqli_query($con,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
    
    echo "<div class='alert alert-warning text-center' role='alert'>
        Are you sure you want to delete category '{$category_title}'?
        <form method='post' action=''>
            <input type='submit' name='yes' value='Yes' class='btn btn-danger'>
            <input type='submit' name='no' value='No' class='btn btn-primary'>
        </form>
    </div>";

    if(isset($_POST['yes'])){
        $delete_category="DELETE FROM `categories` WHERE `category_id`=$delete_category_id";
        $result=mysqli_query($con,$delete_category);

        echo "<div class='alert alert-success text-center' role='alert'>
            Category '{$category_title}' has been deleted!.</div>";

        
    }

    if(isset($_POST['no'])){
        echo "<script>window.open('./view_categories.php','_self')</script>";
    }
}
?>
