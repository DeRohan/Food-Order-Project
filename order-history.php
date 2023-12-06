<?php include('partials-usr/menu.php');
include('config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <section class="food-search">
        <h1 class="text-center" style="color: #FFF">Order History</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Restaurant Name</th>
                </tr>
            </thead>
            <tbody style="color: black; background-color: white;">
                <!-- Sample order data, replace this with your dynamic data from the database -->
                <?php
                $user_id = $_SESSION['customer'];
                $sql = "SELECT * FROM tbl_orders WHERE user_id = $user_id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $order_id = $row['order_id'];
                        $status = $row['status'];
                        ?>
                        <tr>
                            <td rowspan="2">
                                <?php echo $order_id ?>
                            </td>
                            <?php
                            $res_id = $row['restaurant_id'];


                            $sql2 = "SELECT * FROM tbl_restaurants WHERE ID = $res_id";
                            $res2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($res2);
                            $res_name = $row2['Name'];

                            $sql3 = "SELECT * FROM tbl_order_details WHERE order_id = $order_id";
                            $res3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($res3) > 0) {
                                while ($row = mysqli_fetch_assoc($res3)) {
                                    $quan = $row['quantity'];
                                    $price = $row['price'];
                                    $item_id = $row['item_id'];

                                    $sql4 = "SELECT * FROM tbl_food WHERE id = $item_id";
                                    $res4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_assoc($res4);
                                    $item_name = $row4['title'];

                                    ?>
                                    <td>
                                        <?php echo $item_name; ?>
                                    </td>
                                    <td>
                                        <?php echo $quan; ?>
                                    </td>
                                    <td>
                                        <?php echo $price; ?>
                                    </td>
                                    <td>
                                        <?php echo $status; ?>
                                    </td>
                                    <td>
                                        <?php echo $res_name; ?>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                    }
                }

                ?>
            </tbody>
        </table>
    </section>
</body>

</html>


<?php include('partials-usr/footer.php'); ?>