<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <div class="col-4 text-center">
                    <?php
                        $sql = "SELECT * FROM tbl_categories";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                    ?>
                    <h1><?php echo $count;?></h1>
                    <br>
                    Total Categories
                    <br>
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql = "SELECT * FROM tbl_restaurants";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                    ?>
                    <h1><?php echo $count;?></h1>
                    <br>
                    Restaurants
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql = "SELECT * FROM tbl_users ";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                    ?>
                    <h1><?php echo $count;?></h1>
                    <br>
                    Users
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql = "SELECT * FROM tbl_orders ";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                    ?>
                    <h1><?php echo $count;?></h1>
                    <br>
                    Total Orders
                </div>
                <div class="col-4 text-center">
                    <?php 
                        $sql4 = "SELECT SUM(tr.amount) as Total FROM tbl_transactions tr
                                INNER JOIN tbl_orders ord on tr.order_id = ord.order_id
                                WHERE ord.status = 'Delivered'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        if($row4['Total'] > 0) {
                            $total = $row4['Total'];
                        }
                        else{
                            $total = 0;
                        }
                    ?>
                    <h1><?php echo $total;?></h1>
                    <br>
                    Revenue Generated
                </div>
                <div class="clearfix"> </div>
            </div>
            
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>