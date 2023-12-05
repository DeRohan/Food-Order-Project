<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Restaurants</h1>
        <br>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <table class="tbl-full">
            <tr>
                <th>Sr.No.</th>
                <th>Restaurant Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM tbl_restaurants where ';
            $result = mysqli_query($conn, $sql);
            $sn = 1;
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $rows['ID'];
                        $name = $rows['Name'];
                        $address = $rows['Address'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $sn++; ?>.
                            </td>
                            <td>
                                <?php echo $name; ?>
                            </td>
                            <td>
                                <?php echo $address; ?>
                            </td>
                            <td>
                                <a href="update-restaurant.php?id=<?php echo $id; ?>" class="btn-secondary">Update Restaurant</a>
                            </td>
                        </tr>
                        <?php
                    }

                }
            }
            ?>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>