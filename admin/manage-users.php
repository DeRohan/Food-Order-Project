<?php include ('partials/menu.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Users</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            ?>
            <table class="tbl-full">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
                <?php 
                    $sql = "SELECT * FROM tbl_users";
                    $result = mysqli_query($conn, $sql);
                    $sn = 1;
                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['user_id'];
                            $fname = $row['F_Name'];
                            $lname = $row['L_Name'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $addr = $row['address'];

                            echo "<tr>
                                <td>$fname</td>
                                <td>$lname</td>
                                <td>$username</td>
                                <td>$email</td>
                                <td>$addr</td>
                                <td>
                                    <a href='delete-user.php?id=$id' class='btn-danger'>Delete User</a>
                                </td>
                            ";
                        }
                    }
                    else{
                        echo "<tr><td colspan='6' class='error'>No Users Have Registered Yet!</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>
<?php include ('partials/footer.php') ?>