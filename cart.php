<?php include('partials-usr/menu.php');
include('partials-usr/login-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container">
        <title>Shopping Cart</title>
    </div>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {

            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .cart-container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .cart-item img {
            max-width: 80px;
            max-height: 80px;
            margin-right: 10px;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-weight: bold;
        }

        .checkout-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .continue-btn {
            background-color: #0984e3;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .empty-btn {
            background-color: #d63031;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <section class="food-search">
        <header>
            <h1>Shopping Cart</h1>
        </header>

        <div class="cart-container">
            <?php
            $sql = "SELECT * FROM tbl_cart";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $total = 0;
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $f_id = $row['item_id'];
                    $quantity = $row['quantity'];

                    $sql2 = "SELECT * FROM tbl_food WHERE id = $f_id";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $f_title = $row2['title'];
                    $f_price = $row2['price'];
                    $image_name = $row2['image_name'];
                    $total += ($f_price * $quantity);
                    ?>
                    <div class="cart-item">
                        <img src="<?php echo $home_url; ?>images/restaurant/<?php echo $image_name;?>" alt="<?php echo $f_title;?>">
                        <div>
                            <h3><?php echo $f_title;?></h3>
                            <p>Price: <?php echo $f_price;?></p>
                            <p>Quantity: <?php echo $quantity;?></p>
                        </div>
                        <p><?php echo $f_price * $quantity;?></p>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="cart-total">
                <h3>Total</h3>
                <p><?php echo $total;?></p>
            </div>
            <br><br>
            <a href="checkout.php">
                <button class="checkout-btn">Proceed to Checkout</button>
            </a>
            <a href="<?php echo $home_url;?>">
                <button action="" class="continue-btn">Continue Shopping</button>
            </a>
            <a href="<?php echo $home_url;?>empty-cart.php">
                <button action="" class="empty-btn">Empty Cart</button>
            </a>
        </div>
    </section>
</body>

</html>


<?php include('partials-usr/footer.php'); ?>