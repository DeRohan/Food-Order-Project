<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Feedback</h1>
            <?php 
                if(isset($_SESSION['reply'])) {
                    ?>
                    <br>
                    <?php
                    echo $_SESSION['reply'];
                    unset($_SESSION['reply']);
                    ?>
                    <br><br>
                    <?php
                }
                if(isset($_SESSION['delete'])) {
                    ?>
                    <br>
                    <?php
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                    ?>
                    <br><br>
                    <?php
                }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>Feedback ID</th>
                    <th>Feedback</th>
                    <th>Username</th>
                    <th>Feedback Date</th>
                    <th>Reply</th>
                    <th>Actions</th>
                    <?php 
                        $fd_data = "SELECT * FROM tbl_feedback";
                        $fd_result = mysqli_query($conn, $fd_data);
                        $sn = 1;
                        if(mysqli_num_rows($fd_result) > 0) {
                            while($row = mysqli_fetch_assoc($fd_result)) {
                                $usr_id = $row['user_id'];
                                $fd_id = $row['id'];
                                $fd = $row['fd_desc'];
                                $date = $row['fd_date'];

                                //Fetch User that gives feedback
                                $fetch_user = "SELECT * FROM tbl_users WHERE user_id = $usr_id";
                                $usr_data = mysqli_query($conn, $fetch_user);
                                $usr_row = mysqli_fetch_assoc($usr_data);
                                $username = $usr_row['username'];

                                //Fetch Admin's Reply
                                $fetch_reply = "SELECT * FROM tbl_admin_reply WHERE fd_id = $fd_id";
                                $reply_data = mysqli_query($conn, $fetch_reply);
                                if(mysqli_num_rows($reply_data)==1){
                                    $replied = True;
                                    $reply_row = mysqli_fetch_assoc($reply_data);
                                    $reply = $reply_row['reply'];
                                }
                                else{
                                    $replied = False;
                                }

                                echo "<tr>";
                                echo "<td>$sn</td>";
                                echo "<td>$fd</td>";
                                echo "<td>$username</td>";
                                echo "<td>$date</td>";
                                if($replied){
                                    echo "<td>$reply</td>";
                                }
                                else{
                                    echo "<td>Not Replied</td>";
                                    echo "<td><a href='reply-feedback.php?fd_id=$fd_id' class='btn-secondary' style='padding: 3px;'>Reply</a></td>";
                                }
                                echo "<td><a href='delete-feedback.php?fd_id=$fd_id' class='btn-danger'>Delete Feedback</a></td>";
                                echo "</tr>";
                            }

                        }
                    ?>
                </tr>
            </table>
        </div>
    </div>

<?php include ('partials/footer.php'); ?>