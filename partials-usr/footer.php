<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add this CSS here */

        /* Social Section Styles */
        .social {
            background-color: #f8f8f8;
            padding: 40px 0;
        }

        .social-icons {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 20px;
        }

        .social-link img {
            width: 50px; /* Adjust the size of the social icons */
            height: 50px;
            border-radius: 50%; /* Make the social icons circular */
            transition: transform 0.3s ease-in-out;
        }

        .social-link img:hover {
            transform: scale(1.2); /* Add a zoom effect on hover */
        }

        /* Footer Section Styles */
        .footer {
            background-color:#dc3545;
            color: #fff;
            padding: 20px 0;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        /* Adjustments for Mobile Responsiveness */
        @media (max-width: 768px) {
            .social {
                padding: 20px 0;
            }

            .social-link img {
                width: 40px;
                height: 40px;
            }

            .footer {
                padding: 10px 0;
            }
        }
    </style>
    <title>FOODHOUSE</title>
</head>
<body>

    <!-- Social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul class="social-icons">
                <li>
                    <a href="#" class="social-link">
                        <img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" alt="Facebook"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" alt="Instagram"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <img src="https://img.icons8.com/fluent/48/000000/twitter.png" alt="Twitter"/>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- Social Section Ends Here -->

    <!-- Footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>&copy; 2023 The Food House. All Rights Reserved.</p>
        </div>
    </section>
    <!-- Footer Section Ends Here -->

    <!-- External JavaScript File -->
    <script src="js/index-script.js"></script>
</body>
</html>
