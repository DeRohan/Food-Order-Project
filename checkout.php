<?php 
    include ('config/connect.php');
    include ('partials-usr/login-check.php');

    // $payment = $_POST['payment'];
    $payment = "Cash on Delivery";
    $user_id = $_SESSION['customer'];
    $sql = "SELECT * FROM tbl_cart";
    $result = mysqli_query($conn, $sql);
    $total = 0;
    $ord_date = date('Y-m-d');
    $status = 'Preparing';

    $usr_add = "SELECT * FROM tbl_users WHERE user_id = $user_id";
    $res_usr = mysqli_query($conn, $usr_add);
    $row_usr = mysqli_fetch_assoc($res_usr);
    $address = $row_usr['address'];

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $res_id = $row['res_id'];

        $order_query = "INSERT INTO tbl_orders SET
            order_id = 15,
            user_id = $user_id,
            restaurant_id = $res_id,
            date = '$ord_date',
            address = '$address',
            payment = '$payment',
            status = '$status'
        ";
        $order_res = mysqli_query($conn, $order_query);
        $current_order = mysqli_insert_id($conn);
        if($order_res == true) {
            $sql_cart = "SELECT * FROM tbl_cart";
            $res_cart = mysqli_query($conn, $sql_cart);
            $total_amount = 0;
            if(mysqli_num_rows($res_cart) > 0) {
                while($row_cart = mysqli_fetch_assoc($res_cart)) {
                    $f_id = $row_cart['item_id'];
                    $quantity = $row_cart['quantity'];
                    $sql_food = "SELECT * FROM tbl_food WHERE id = $f_id";
                    $res_food = mysqli_query($conn, $sql_food);
                    $row_food = mysqli_fetch_assoc($res_food);
                    $f_price = $row_food['price'];
                    $total = $f_price * $quantity;
                    $total_amount = $total_amount + $total;
                    $sql_details = "INSERT INTO tbl_order_details SET
                        id = 19,
                        order_id = $current_order,
                        item_id = $f_id,
                        quantity = $quantity,
                        price = $f_price
                    ";
                    $add_details = mysqli_query($conn, $sql_details);
                }
            }
            $sql_tr = "INSERT INTO tbl_transactions SET
                tr_id = 8,
                order_id = $current_order,
                amount = $total_amount,
                method = '$payment',
                tr_date = '$ord_date',
                status = 'Paid'
            ";
            $res_tr = mysqli_query($conn, $sql_tr);
            if($res_tr == true) {
                $sql_del = "DELETE FROM tbl_cart";
                $res_del = mysqli_query($conn, $sql_del);
                $_SESSION['order'] = "<div class='success'>Order Placed Successfully.</div>";
                // header("location:".$home_url."index.php");
                echo "<script>window.location.href='" . $home_url . "index.php';</script>";
            }
            else{
                $_SESSION['order'] = "<div class='error'>Failed to Place Order.</div>";
                // header("location:".$home_url."index.php");
                echo "<script>window.location.href='" . $home_url . "index.php';</script>";
            }
        }
    }
    else{
        $_SESSION['cart'] = "<div class='error'>Your cart is empty.</div>";
        // header("location:".$home_url."restaurants.php");
        echo "<script>window.location.href='" . $home_url . "restaurants.php';</script>";
    }
?>