<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-center">Current Restaurant Details</h1>
            <br><br>
            <?php
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_restaurants WHERE ID=$id";
                    $result = mysqli_query($conn, $sql);
                    if($result==true) {
                        $count = mysqli_num_rows($result);
                        if($count==1) {
                            $rows = mysqli_fetch_assoc($result);
                            $name = $rows['Name'];
                            $address = $rows['Address'];
                            $description = $rows['Description'];
                        }
                        else {
                            header('location:'. $home_url . 'admin/manage-restaurants.php');
                        }
                    }
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-full text-center">
                    <td>Name:</td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    <td>Address:</td>
                    <td><input type="text" name="address" value="<?php echo $address?>" size="30"></td>
                    <td>Description:</td>
                    <td><input type="text" name="description" value="<?php echo $description ?>" size="50"></td>
                    <tr>
                        <td colspan="8">
                            <input type="submit" name="submit" value="Update Restaurant" class="btn-change">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include ('partials/footer.php');?>

<?php 
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        if($name == "" || $name == " ") {
            $_SESSION['add'] = "<div class='error'>Name Cannot Be Null :( </div>";
            header('location:'. $home_url . 'admin/add-restaurant.php');
            die();
        }
        elseif ($address == "" || $address == " ") {
            $_SESSION['add'] = "<div class='error'>Address Cannot Be Null :( </div>";
            header('location'. $home_url. "admin/add-restaurant.php");
            die();
        }

        $sql = "UPDATE tbl_restaurants SET
            Name = '$name',
            Address = '$address',
            Description = '$description'
            WHERE ID = $id
        ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($result){
            $_SESSION['update'] = "<div class='success'>Restaurant Updated Successfully!</div>";
            header('location:'. $home_url . 'admin/manage-restaurants.php');
        }
        else {
            $_SESSION['update'] = "<div class='error'>Failed to Updated Restaurant :( </div>";
            header('location:'. $home_url . 'admin/add-restaurant.php');
        }
    }
?>