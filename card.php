<?php
    include('partials-usr/menu.php');
    include('partials-usr/login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Add your existing styles here */

        /* Style for input fields in the credit card form */
        .custom-input-credit-card {
            width: calc(100% - 18px);
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style for the credit card form container */
        .credit-card-form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white; /* Original color */
            border-radius: 10px; /* Soft edges */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        /* Style for the container of expiry date and CVV */
        .expiry-cvv-container {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Center vertically */
        }

        /* Style for expiry date and CVV inputs */
        .expiry-input,
        .cvv-input {
            width: 48%;
        }

        /* Add space between CVV and Expiry Date */
        .cvv-input {
            margin-right: 10px;
        }

        /* Style for the Confirm Payment button */
        .confirm-payment-button {
            background-color: #F76D7C; /* Watermelon color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block; /* Centering adjustment */
            margin: 0 auto; /* Centering adjustment */
        }

        .confirm-payment-button:hover {
            background-color: #D65A6F; /* Darker shade on hover */
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to format card number as xxx-xxx-xxx-xxx-xxxx
        function formatCardNumber(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length > 16) {
                value = value.slice(0, 16);
            }

            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            input.value = formattedValue;
        }

        // Function to format CVV as x-x-x
        function formatCVV(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length > 3) {
                value = value.slice(0, 3);
            }

            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i > 0) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            input.value = formattedValue;
        }

        // Function to format expiry date as YYYY-MM-DD
        function formatExpiryDate(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length > 8) {
                value = value.slice(0, 8);
            }

            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i === 4 || i === 6) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            input.value = formattedValue;
        }

        // Event listener for card number input
        const cardNumberInput = document.querySelector('input[name="card_number"]');
        cardNumberInput.addEventListener('input', function () {
            formatCardNumber(this);
        });

        // Prevent removing hyphens manually
        cardNumberInput.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && (this.selectionStart === this.selectionEnd)) {
                if (this.selectionStart % 5 === 0) {
                    e.preventDefault();
                }
            }
        });

        // Event listener for CVV input
        const cvvInput = document.querySelector('input[name="cvv"]');
        cvvInput.addEventListener('input', function () {
            formatCVV(this);
        });

        // Prevent removing hyphens manually for CVV
        cvvInput.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && (this.selectionStart === this.selectionEnd)) {
                if (this.selectionStart % 2 === 0) {
                    e.preventDefault();
                }
            }
        });

        // Event listener for expiry date input
        const expiryDateInput = document.querySelector('input[name="expiry_date"]');
        expiryDateInput.addEventListener('input', function () {
            formatExpiryDate(this);
        });

        // Allow backspacing hyphens manually for expiry date
        expiryDateInput.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && (this.selectionStart === this.selectionEnd)) {
                if (this.selectionStart === 7 || this.selectionStart === 5) {
                    e.preventDefault();
                }
            }
        });
    });
</script>

</head>
<body>

<section class="food-search">
    <div class="custom-container credit-card-form-container">
        <!-- Form for editing credit card details -->
        <h2 class="custom-heading">Credit Card Details</h2>
        <form action="" method="POST">
            <label for="card_name" class="custom-label">Cardholder's Name</label>
            <input type="text" name="card_name" value="" class="custom-input-credit-card" required>

            <label for="card_number" class="custom-label">Card Number</label>
            <input type="text" name="card_number" value="" class="custom-input-credit-card" required>

            <!-- Container for Expiry Date and CVV -->
            <div class="expiry-cvv-container">
                <!-- CVV -->
                <label for="cvv" class="custom-label">CVV</label>
                <input type="text" name="cvv" value="" class="custom-input-credit-card cvv-input" required>

                <!-- Expiry Date -->
                <label for="expiry_date" class="custom-label">Expiry Date</label>
                <input type="text" name="expiry_date" value="" class="custom-input-credit-card expiry-input" placeholder="YYYY-MM-DD" required>
            </div>

            <!-- Confirm Payment button -->
            <button type="submit" name="confirm_payment" class="confirm-payment-button">Confirm Payment</button>
        </form>
    </div>
</section>

<?php include('partials-usr/footer.php'); ?>
</body>
</html>
