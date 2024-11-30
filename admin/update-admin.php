<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>


            <?php 
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_admin WHERE admin_id=$id";
                $result = mysqli_query($conn, $sql);

                if($result==true) {
                    if(mysqli_num_rows($result) == 1) {
                        $data = mysqli_fetch_assoc($result);
                        $full_name = $data['full_name'];
                        $username = $data['username'];

                    }
                    else{
                        header("location:".$home_url."admin/admin-panel.php");
                    }
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Confirm Update" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



<?php
    if(isset($_POST["submit"])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE admin_id=$id
        ";
        $result = mysqli_query($conn, $sql);

        if($result==true) {
            $_SESSION['update'] = "<div class='success'>Admin Updated Succesfully!</div>";
            // header("location:" .$home_url.'admin/admin-panel.php');
            echo "<script>window.location.href='" . $home_url . "admin/admin-panel.php';</script>";
        }
        else{
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin!</div>";
            // header("location:" .$home_url.'admin/admin-panel.php');
            echo "<script>window.location.href='" . $home_url . "admin/admin-panel.php';</script>";

        }
    }
?>
<?php include ('partials/footer.php'); ?>