<?php include('partials/menu.php'); ?>


<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <!-- Button To Add Admin -->
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        ?>
        <br><br><br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>Admin ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_admin";
            $result = mysqli_query($conn, $sql);
            if ($result == true) {
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $rows['admin_id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $full_name; ?>
                            </td>
                            <td>
                                <?php echo $username; ?>
                            </td>
                            <td>
                                <a href="change-password.php?id=<?php echo $id; ?>" class="btn-change">Change Password</a>
                                <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
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
<!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>