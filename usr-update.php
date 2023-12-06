<?php
    include ('partials-usr/menu.php');
    include ('partials-usr/login-check.php');

    $id = $_SESSION['customer'];
    $sql = "SELECT * FROM tbl_users WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $userData = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the form is submitted for editing
        if (isset($_POST['edit_details'])) {
            $isEditing = true;
        } 
        elseif (isset($_POST['save_changes'])) {
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            
            $update_data = "UPDATE tbl_users SET
                F_Name = '$fname',
                L_Name = '$lname',
                username = '$username',
                email = '$email',
                address = '$address'
                WHERE user_id = '$id'
            ";
            $save = mysqli_query($conn, $update_data);
            if($save==true) {
                $isEditing = false;
                $_SESSION['update'] = "<div class='success'>User Details Updated Successfully! :D</div>";
                header("location:" .$home_url.'usr-update.php');
            }
            else{
                $isEditing = false;
                $_SESSION['update'] = "<div class='error'>Failed to Update User Details! :(</div>";
                header("location:" .$home_url.'usr-update.php');
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .custom-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .custom-heading {
            color: #333;
        }

        .custom-paragraph {
            margin: 10px 0;
            color: #555;
        }

        .custom-label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        .custom-input,
        .custom-textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .custom-button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<section class="food-search">
    <div class="custom-container">
        <?php if (!$isEditing): ?>
            <!-- Display user details -->
            <h2 class="custom-heading">User Details</h2>
            <?php 
                if(isset($_SESSION['update'])) {
                    ?>
                    <br>
                    <?php
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                    ?>
                    <br><br>
                    <?php
                }
            ?>
            <p class="custom-paragraph"><strong>First Name:</strong> <?php echo $userData['F_Name']; ?></p>
            <p class="custom-paragraph"><strong>Last Name:</strong> <?php echo $userData['L_Name']; ?></p>
            <p class="custom-paragraph"><strong>Username:</strong> <?php echo $userData['username']; ?></p>
            <p class="custom-paragraph"><strong>Email:</strong> <?php echo $userData['email']; ?></p>
            <p class="custom-paragraph"><strong>Address:</strong> <?php echo $userData['address']; ?></p>

            <!-- Button to initiate editing -->
            <form action="" method="POST">
                <input type="submit" name="edit_details" value="Edit Details" class="custom-button">
            </form>
        <?php else: ?>
            <!-- Form for editing user details -->
            <h2 class="custom-heading">Edit User Details</h2>
            <form action="" method="POST">
                <label for="first_name" class="custom-label">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $userData['F_Name']; ?>" class="custom-input" required>

                <label for="last_name" class="custom-label">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $userData['L_Name']; ?>" class="custom-input" required>

                <label for="username" class="custom-label">Username:</label>
                <input type="text" name="username" value="<?php echo $userData['username']; ?>" class="custom-input" required>

                <label for="email" class="custom-label">Email:</label>
                <input type="email" name="email" value="<?php echo $userData['email']; ?>" class="custom-input" required>

                <label for="address" class="custom-label">Address:</label>
                <textarea name="address" class="custom-textarea" required><?php echo $userData['address']; ?></textarea>

                <button type="submit" name="save_changes" class="custom-button">Save Changes</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include ('partials-usr/footer.php'); ?>
</body>
</html>