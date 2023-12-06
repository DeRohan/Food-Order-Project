<?php include('partials/menu.php');
$res_usr = $_SESSION['restaurant'];
$sql = "SELECT * FROM tbl_restaurants WHERE username = '$res_usr'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if ($count == 1) {
    $row = mysqli_fetch_assoc($res);
    $res_id = $row['ID'];
} else {
    echo "Error";
}
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login-rest'])) {
            echo $_SESSION['login-rest'];
            unset($_SESSION['login-rest']);
        }
        ?>
        <div class="col-4 text-center">
            <?php
            $sql2 = "SELECT * FROM tbl_food WHERE res_id = $res_id";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);

            ?>
            <h1>
                <?php echo $count2; ?>
            </h1>
            <br>
            Foods
        </div>
        <div class="col-4 text-center">
            <?php
            $sql2 = "SELECT * FROM tbl_orders WHERE restaurant_id = $res_id";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            ?>
            <h1>
                <?php echo $count2; ?>
            </h1>
            <br>
            Orders
        </div>
        <div class="col-4 text-center">
            <?php
            $sql4 = "SELECT SUM(tr.amount) as Total FROM tbl_transactions tr
                                INNER JOIN tbl_orders ord on tr.order_id = ord.order_id
                                WHERE ord.status = 'Delivered' AND ord.restaurant_id = $res_id";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            if ($row4['Total'] > 0) {
                $total = $row4['Total'];
            } else {
                $total = 0;
            }
            ?>
            <h1>
                <?php echo $total; ?>
            </h1>
            <br>
            Total Revenue
        </div>
        <div class="clearfix"> </div>
    </div>

</div>
<!-- Main Content Section Ends -->


<?php include('partials/footer.php'); ?>