<?php
    include ('partials-usr/login-check.php');
    include ('config/connect.php');

    if(isset($_GET['id'])) {
        $f_id = $_GET['id'];
        $sql = "SELECT * FROM tbl_food WHERE id = $f_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $f_title = $row['title'];
        $res_id = $row['res_id'];
        $check_cart = "SELECT  * FROM tbl_cart WHERE res_id != $res_id";
        $res_check = mysqli_query($conn, $check_cart);
        if(mysqli_num_rows($res_check) > 0) {
            $_SESSION['cart'] = "<div class='error'>You can only order from one restaurant at a time.</div>";
            header("location:".$home_url."restaurants.php");
            //die();
        } 
        else {
            $check_item = "SELECT * FROM tbl_cart WHERE item_id = $f_id";
            $res_item = mysqli_query($conn, $check_item);
            if(mysqli_num_rows($res_item) > 0) {
                $item_row = mysqli_fetch_assoc($res_item);
                $quantity = $item_row['quantity'] + 1;
                $sql2 = "UPDATE tbl_cart SET
                    quantity = $quantity
                    WHERE item_id = $f_id";
            }
            else {
                $quantity = 1;
                $sql2 = "INSERT INTO tbl_cart SET
                cart_id = 1,
                item_id = $f_id,
                res_id = $res_id,
                quantity = $quantity
                ";
            }
            $result2 = mysqli_query($conn, $sql2);
            if($result2 == true) {
                $_SESSION['cart'] = "<div class='success'>Food Added to Cart.</div>";
                header("location:".$home_url."cart.php");
            } else {
                $_SESSION['cart'] = "<div class='error'>Failed to Add Food.</div>";
                header("location:".$home_url."cart.php");
            }
        }
    }
?>
