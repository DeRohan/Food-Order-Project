<?php include ('partials/menu.php'); 
    if(isset($_GET['fd_id'])) {
        $fd_id = $_GET['fd_id'];
        $fetch_fd = "SELECT * FROM tbl_feedback WHERE id = $fd_id";
        $fd_data = mysqli_query($conn, $fetch_fd);
        $fd_row = mysqli_fetch_assoc($fd_data);
        $fd = $fd_row['fd_desc'];
        $usr_id = $fd_row['user_id'];
        $fetch_usr = "SELECT * FROM tbl_users WHERE user_id = $usr_id";
        $usr_data = mysqli_query($conn, $fetch_usr);
        $usr_row = mysqli_fetch_assoc($usr_data);
        $username = $usr_row['username'];
    }
?>
<div class="main-content">
    <div class="wrapper">
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Feedback:</td>
                    <td>
                        <textarea name="fd" cols="30" rows="5" readonly><?php echo $fd; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Reply:</td>
                    <td>
                        <textarea name="reply" cols="30" rows="5" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="fd_id" value="<?php echo $fd_id; ?>">
                        <input type="submit" name="submit" value="Reply Feedback" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include ('partials/footer.php'); ?>

<?php 
    if(isset($_POST['submit'])) {
        $fd_id = $_POST['fd_id'];
        $reply = $_POST['reply'];
        $admin_id = $_SESSION['admin'];
        $insert_reply = "INSERT INTO tbl_admin_reply SET
            fd_id = $fd_id,
            reply = '$reply',
            admin_id = $admin_id
        ";
        $replied_query = "UPDATE tbl_feedback SET
            replied = 'Yes' WHERE id = $fd_id
        ";
        $reply_data = mysqli_query($conn, $insert_reply);
        $replied_res = mysqli_query($conn, $replied_query);
        if($reply_data && $replied_res) {
            $_SESSION['reply'] = "<div class='success'>Reply Sent Successfully.</div>";
            header('location:'.$home_url.'admin/manage-feedback.php');
        } else {
            $_SESSION['reply'] = "<div class='error'>Failed to Send Reply.</div>";
            header('location:'.$home_url.'admin/manage-feedback.php');
        }
    }
?>