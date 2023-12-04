<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Page</title>
</head>
<body>
    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <a href="#">Forgot your password?</a>
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
            <div><img src="../images/food-icons/icons8-chinese-noodle-94.png" alt="noodles"></div>
            <div><img src="../images/food-icons/icons8-cherry-cheesecake-94.png" alt="cheescake"></div>
            <div><img src="../images/food-icons/icons8-cookies-94.png" alt="cookies"></div>
            <div><img src="../images/food-icons/icons8-doughnut-94.png" alt="doughnut"></div>
            <div><img src="../images/food-icons/icons8-french-fries-94.png" alt="fries"></div>
            <div><img src="../images/food-icons/icons8-gingerbread-house-94.png" alt="gingerbread"></div>
            <div><img src="../images/food-icons/icons8-grapes-94.png" alt="grapes"></div>
            <div><img src="../images/food-icons/icons8-hamburger-94.png" alt="hamburger"></div>
        </div>
    </section>
    <!-- partial -->
      <script  src="../js/login.js"></script>
</body>
</html>