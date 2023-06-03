<h3 class="text-center text-success">All users</h3>
<?php 
$get_users="SELECT * FROM `user_table`";
$result=mysqli_query($con,$get_users);
$row_count=mysqli_num_rows($result);
if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No users for now</h2>";
}else{
    echo "<table class='table table-bordered mt-5'>
            <thead class='bg-warning'>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo "<tr>
                <td><b>$number</b></td>
                <td><b>$username</b></td>
                <td><b>$user_email</b></td>
                <td><img src='../users_area/user_images/$user_image' width='50' height='50' alt='User Image'></td>
                <td><b>$user_address</b></td>
                <td><b>$user_mobile</b></td>
                <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
    }
    echo "</tbody>
        </table>";
}
?>
