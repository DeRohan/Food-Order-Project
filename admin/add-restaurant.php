<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br><br><br>
        <h1>Add Restaurants</h1>
        <br><br>
        <form action="" method="POST">
            <div class="tbl-30">
                <table class="tbl-full">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" placeholder="Restaurant Name"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="address" placeholder="Restaurant Address"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><input type="text" name="description" placeholder="Tell us about your specialities!" size="25"></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <input type="submit" name="submit" value="Add Restaurant" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php 
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        if($name=="" || $name==" ") {
            $_SESSION['add'] = "<div class='error'>Name Cannot Be Null :( </div>";
            header('location:'. $home_url . 'admin/add-restaurant.php');
            die();
        }
        elseif ($address == "" || $address == " ") {
            $_SESSION['add'] = "<div class='error'>Address Cannot Be Null :( </div>";
            header('location'. $home_url. "admin/add-restaurant.php");
            die();
        }

        $sql = "INSERT INTO tbl_restaurants SET
            Name = '$name',
            Address = '$address',
            Description = '$description'
        ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($result) {
            $current_id = mysqli_insert_id($conn);
            $current_date = date('Y-m-d');
            $sql2 = "INSERT INTO tbl_restaurant_registration SET
                restaurant_id = $current_id,
                registration_date = '$current_date'
            ";
            $result2 = mysqli_query($conn, $sql2);
            echo "fr";
            if($result2) {
                $_SESSION['add'] = "<div class='success'>Restaurant Added Successfully :)</div>";
                header('location:'. $home_url . 'admin/manage-restaurants.php');
            }
            else {
                $_SESSION['add'] = "<div class='error'>Failed to Add Restaurant :(</div>";
                header('location:'. $home_url . 'admin/add-restaurant.php');
            }
        }
    }
?>