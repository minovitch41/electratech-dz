<?php 
if(isset($_GET['delete_brand'])){
    $brand_id=$_GET['delete_brand'];
    $get_brand="SELECT * FROM `brands` WHERE `brand_id`=$brand_id";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];

    if(isset($_POST['yes'])){
        $delete_query="DELETE FROM `brands` WHERE `brand_id`=$brand_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo "<div class='alert alert-success text-center'>Brand $brand_title has been deleted successfully.</div>";
            echo "<meta http-equiv='refresh' content='5;url=index.php?view_brands'>";
        }else{
            echo "<div class='alert alert-danger text-center'>Error: Failed to delete brand $brand_title. Please try again.</div>";
        }
    }else if(isset($_POST['no'])){
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }else{
        echo "<div class='alert alert-warning text-center'>
                    <h4>Are you sure you want to delete brand '$brand_title'?</h4>
                    <form method='post' action=''>
                    <input type='submit' name='yes' value='Yes' class='btn btn-danger'>
                    <input type='submit' name='no' value='No' class='btn btn-primary'>
                  </form>
              </div>";
    }
}
?>
