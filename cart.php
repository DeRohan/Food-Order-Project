<?php include ('partials-usr/menu.php'); 
    include ('partials-usr/login-check.php');
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
            background-color: #333;
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
    </style>
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
    </header>

    <div class="cart-container">
        <div class="cart-item">
            <img src="product1.jpg" alt="Product 1">
            <div>
                <h3>Product 1</h3>
                <p>Price: $19.99</p>
                <p>Quantity: 2</p>
            </div>
            <p>$39.98</p>
        </div>

        <div class="cart-item">
            <img src="product2.jpg" alt="Product 2">
            <div>
                <h3>Product 2</h3>
                <p>Price: $29.99</p>
                <p>Quantity: 1</p>
            </div>
            <p>$29.99</p>
        </div>

        <div class="cart-total">
            <span>Total:</span>
            <span>$69.97</span>
        </div>

        <button class="checkout-btn">Proceed to Checkout</button>
    </div>
</body>
</html>


<?php include('partials-usr/footer.php'); ?>