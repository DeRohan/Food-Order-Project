<?php include ("partials/menu.php") ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br><br>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password: </td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password: </td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


<?php 
    if(isset($_POST["submit"])) {
        $id = $_GET['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE admin_id=$id AND password='$current_password'";

        $result = mysqli_query($conn, $sql);

        if($result==true) {

            if(mysqli_num_rows($result)==1) {
                if($new_password==$confirm_password) {
                    $sql2 = "UPDATE tbl_admin SET
                        password = '$new_password'
                        WHERE admin_id=$id
                    ";

                    $result2 = mysqli_query($conn, $sql2);

                    if($result2==true) {
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                        header("location:".$home_url."admin/admin-panel.php");
                    }
                    else {
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password</div>";
                        header("location:".$home_url."admin/admin-panel.php");
                    }
                }
                else {
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match</div>";
                    header("location:".$home_url."admin/admin-panel.php");
                }
            }
            else {
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header("location:".$home_url."admin/admin-panel.php");
            }
        }
    }
?>

<?php include ("partials/footer.php") ?>