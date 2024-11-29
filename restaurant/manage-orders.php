<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">Manage Orders</h2>
        <br>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Username</th>
                <th>Items</th>
                <th>Total Bill</th>
                <th>Current Status</th>
                <th>Change Status</th>
            </tr>
            <?php
            $sql = "SELECT o.order_id, r.Name as restaurant_name, f.title as item_name, od.quantity, f.price, o.status, u.username as username, tr.amount 
                        FROM tbl_orders o
                        INNER JOIN tbl_order_details od ON o.order_id = od.order_id
                        INNER JOIN tbl_food f ON od.item_id = f.id
                        INNER JOIN tbl_restaurants r ON o.restaurant_id = r.ID
                        INNER JOIN tbl_users u on o.user_id = u.user_id
                        INNER JOIN tbl_transactions tr on o.order_id = tr.order_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['order_id'];
                    $restaurant_name = $row['restaurant_name'];
                    $item_title = $row['item_name'];
                    $quantity = $row['quantity'];
                    $price = $row['price'];
                    $status = $row['status'];
                    $usrname = $row['username'];
                    $total = $row['amount']
            
                        ?>
                    <tr>
                        <td>
                            <?php echo $order_id ?>
                        </td>
                        <td>
                            <?php echo $usrname ?>
                        </td>
                        <td>
                            <?php echo $item_title ?>
                        </td>
                        <td>
                            <?php echo $total ?>
                        </td>
                        <td>
                            <?php echo $status ?>
                        </td>
                        <td>
                            <form action="" method="POST" name="status-change" id="statusForm_<?php echo $order_id; ?>">
                                <!-- <label for="status">Change Status</label> -->
                                <select name="status" onchange="document.getElementById('statusForm_<?php echo $order_id; ?>').submit()"
                                    style="width: 100; height: 30;background-color: #38ada9;font-size: 15;">
                                    <option value="Ordered">Ordered</option>
                                    <option value="Preparing">Preparing</option>
                                    <option value="Delivering">Delivering</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                            </form>
                        </td>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $order_id = $_POST['order_id'];
        $new_status = $_POST['status'];
    
        // Perform the database update here
        $update_query = "UPDATE tbl_orders SET status = '$new_status' WHERE order_id = $order_id";
        $update_result = mysqli_query($conn, $update_query);
    
        if ($update_result) {
            echo "Order status updated successfully.";
        } else {
            echo "Error updating order status: " . mysqli_error($conn);
        }
    }
?>