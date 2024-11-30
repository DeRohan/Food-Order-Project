<?php
include('partials-usr/menu.php');
include('partials-usr/login-check.php');

// Dummy user data for testing



if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for new feedback
    if(isset($_POST['submit_feedback'])) {
        $newFeedback = $_POST['new_feedback'];
        $usr_id = $_SESSION['customer'];
        $fd_date = date('Y-m-d');
        $insert_fd = "INSERT INTO tbl_feedback SET
                        user_id = $usr_id,
                        fd_desc = '$newFeedback',
                        fd_date = '$fd_date',
                        replied = 'No'
            ";
        $insert_fd_res = mysqli_query($conn, $insert_fd);
        if($insert_fd_res) {
            echo "<script>alert('Your Feedback has been submitted successfully! Thank you.');</script>";
            // header('location: '.$home_url.'feedback.php');
            echo "<script>window.location.href='" . $home_url . "feedback.php';</script>";
        } else {
            echo "Error: ".mysqli_error($conn);
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .feedback-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .feedback-heading {
            color: #333;
        }

        .feedback-paragraph {
            margin: 10px 0;
            color: #555;
        }

        .feedback-label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        .feedback-textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .feedback-button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .feedback-button:hover {
            background-color: #45a049;
        }

        .feedback-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .admin-reply {
            color: #007bff;
        }
    </style>
</head>

<body>

    <section class="food-search">
        <div class="feedback-container">

            <!-- Form for submitting new feedback -->
            <h2 class="feedback-heading">Submit Feedback</h2>
            <form action="" method="POST">
                <label for="new_feedback" class="feedback-label">Your Feedback:</label>
                <textarea name="new_feedback" class="feedback-textarea" required></textarea>
                <button type="submit" name="submit_feedback" class="feedback-button">Submit Feedback</button>
            </form>

            <!-- Display previous feedback -->
            <h2 class="feedback-heading">Previous Feedback</h2>
            <?php
            $usr_id = $_SESSION['customer'];
            $fetch_fd = "SELECT * FROM tbl_feedback WHERE user_id = $usr_id";
            $fd_data = mysqli_query($conn, $fetch_fd);
            if(mysqli_num_rows($fd_data) > 0) {
                while($row = mysqli_fetch_assoc($fd_data)) {
                    $fd_id = $row['id'];
                    $fd = $row['fd_desc'];
                    $fd_date = $row['fd_date'];
                    $replied = $row['replied'];
                    if($replied == 'Yes') {
                        $ad_reply = "SELECT * FROM tbl_admin_reply WHERE fd_id = $fd_id";
                        $admin_reply_data = mysqli_query($conn, $ad_reply);
                        $admin_data = mysqli_fetch_assoc($admin_reply_data);
                        $admin_reply = $admin_data['reply'];
                    }
                    ?>
                    <div class="feedback-item">
                        <p class="feedback-paragraph"><strong>Date:</strong>
                            <?php echo $fd_date; ?>
                        </p>
                        <p class="feedback-paragraph"><strong>Your Message:</strong>
                            <?php echo $fd; ?>
                        </p>
                        <?php if($replied == 'Yes'): ?>
                            <p class="admin-reply feedback-paragraph"><strong>Admin Reply:</strong>
                                <?php echo $admin_reply; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="feedback-paragraph">
                    <p>You have not submitted any feedback yet.</p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <?php include('partials-usr/footer.php'); ?>
</body>

</html>