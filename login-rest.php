<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Page</title>
    <style>
        .file-input {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }

        .file-input span {
            display: inline-block;
            padding: 8px 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin: 8px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="rest-sup.php" method="POST" enctype="multipart/form-data">
                    <h1>Create Restaurant</h1>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    ?>
                    <br><br>
                    <input type="text" name="name" placeholder="Restaurant Name" required />
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" minlength="8" required />
                    <input type="text" name="address" placeholder="Address" minlength="10" required />
                    <input type="text" name="description" placeholder="Description" minlength="20" required />
                    <div class="file-input">
                        <span id="file-name">Choose Restaurant Image</span>
                        <input type="file" name="image" accept="image/*" onchange="updateFileName(this)" required />
                    </div>
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="rest-sin.php" method="POST">
                    <h1>Sign in</h1>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    ?>
                    <br><br>
                    <input type="username" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <br>
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>Please Login with your Account Details to Continue.</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Create an Account Today and Start your Journey With us.</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="set">
            <div><img src="images\food-icons\icons8-chinese-noodle-94.png" alt="noodles"></div>
            <div><img src="images\food-icons\icons8-cherry-cheesecake-94.png" alt="cheesecake"></div>
            <div><img src="images\food-icons\icons8-cookies-94.png" alt="cookies"></div>
            <div><img src="images\food-icons\icons8-doughnut-94.png" alt="doughnut"></div>
            <div><img src="images\food-icons\icons8-french-fries-94.png" alt="fries"></div>
            <div><img src="images\food-icons\icons8-gingerbread-house-94.png" alt="gingerbread"></div>
            <div><img src="images\food-icons\icons8-grapes-94.png" alt="grapes"></div>
            <div><img src="images\food-icons\icons8-hamburger-94.png" alt="hamburger"></div>
        </div>
    </section>
    <!-- partial -->
    <script>
            function updateFileName(input) {
                var fileName = input.files[0].name;
                document.getElementById('file-name').innerHTML = fileName;
            }
        </script>
    <script src="js/login.js"></script>
</body>

</html>
