<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br>
        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Your Company Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="Password" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process Form Values and Save it in the Database
    if(isset($_POST['submit'])) { //Button Clicked
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['Password']); //Password Encryption with MD5

        //SQL Query to Save the Data into Database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password' 
        ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($result==true) {
            $_SESSION['add'] = "<div class='success'>Admin Added Succesfully!</div>";
            header("location:" .$home_url.'admin/admin-panel.php');
        }
        else{
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin!</div>";
            header("location:" .$home_url.'admin/add-admin.php');
        }
    }

?>