<h3 class="text-center text-success">All payments</h3>
<?php 
$get_payments="SELECT * FROM `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);
if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No payments for now</h2>";
}else{
    echo "<table class='table table-bordered mt-5'>
            <thead class='bg-warning'>
                <tr>
                    <th>Payment ID</th>
                    
                    <th>Invoice number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $payment_id=$row_data['payment_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo "<tr>
                <td><b>$number</b></td>
                <td><b>$invoice_number</b></td>
                <td><b>$amount DZ</b></td>
                <td><b>$payment_mode</b></td>
                <td><b>$date</b></td>
                <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
    }
    echo "</tbody>
        </table>";
}
?>
