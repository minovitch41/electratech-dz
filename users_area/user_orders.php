
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php 
    
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` WHERE `username`='$username'";
    $result=mysqli_query($con,$get_user);  
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    // echo $user_id;
    
    
    ?>
<h3 class="text-success">All my Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
    <tr>
    <th>Sl no</th>
    <th>amount Due</th>
    <th>total products</th>
    <th>invoice number</th>
    <th>Date</th>
    <th>Complete/Incomplete</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php 
    $get_order_details="SELECT * FROM `user_orders` WHERE `user_id`=$user_id";
    $result_orders=mysqli_query($con,$get_order_details);
    $number = 1; // moved outside the while loop to correctly number the rows
    while($row_orders=mysqli_fetch_assoc($result_orders)){
        $order_id=$row_orders['order_id'];
        $amount_due=$row_orders['amount_due'];
        $total_products=$row_orders['total_products'];
        $invoice_number=$row_orders['invoice_number'];
        $order_status=$row_orders['order_status'];
        if($order_status=='pending'){
            $order_status='incomplete';
        }else{
            $order_status='complete';
            }
        
        $order_date=$row_orders['order_date'];

        echo "<tr>
            <td>$number</td>
            <td>$amount_due DZ</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php
            if($order_status=='complete'){
                echo"<td class='text-warning'>Paid</td>";
            }else{
            echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-center text-light'>Confirm</a></td>
        </tr>";
    }
        $number++;
    } 
?>

        
        
        
        
        
        
        
        
    </tbody>
</table>
</body>
</html>