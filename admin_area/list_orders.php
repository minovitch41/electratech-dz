<h3 class="text-center text-success">All orders</h3>
<?php 
$get_orders="SELECT * FROM `user_orders`";
$result=mysqli_query($con,$get_orders);
$row_count=mysqli_num_rows($result);
if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No orders for now</h2>";
}else{
    echo "<table class='table table-bordered mt-5'>
            <thead class='bg-warning'>
                <tr>
                    <th>Sl. No.</th>
                    <th>Due amount</th>
                    <th>Invoice number</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
                <td><b>$number</b></td>
                <td><b>$amount_due DZ</b></td>
                <td><b>$invoice_number</b></td>
                <td><b>$total_products</b></td>
                <td><b>$order_date</b></td>
                <td><b>$order_status</b></td>
                <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
    }
    echo "</tbody>
        </table>";
}
?>
