<?php include('partials-usr/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Form</title>
    <style>
        /* Unique Form Styles */
        .fancy-body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .fancy-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .fancy-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .fancy-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .fancy-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .fancy-button:hover {
            background-color: #45a049;
        }

        /* Table Styles */
        .fancy-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .fancy-table th, .fancy-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .fancy-table th {
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</head>
<body class="fancy-body">
    <form class="fancy-form">
        <label class="fancy-label" for="fancy-name">Fancy Full Name:</label>
        <input class="fancy-input" type="text" id="fancy-name" name="fancy-name" required>

        <label class="fancy-label" for="fancy-expiryDate">Fancy Expiry Date (YYYY-MM-DD):</label>
        <input class="fancy-input" type="text" id="fancy-expiryDate" name="fancy-expiryDate" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" oninput="formatDateInput(this)" onkeydown="handleBackspace(this)" required>

        <label class="fancy-label" for="fancy-nicNumber">Fancy NIC Number (XXX-XXX-XXX-XXXX-XXXX):</label>
        <input class="fancy-input" type="text" id="fancy-nicNumber" name="fancy-nicNumber" placeholder="XXX-XXX-XXX-XXXX-XXXX" pattern="\d{3}-\d{3}-\d{3}-\d{4}-\d{4}" oninput="formatNicInput(this)" onkeydown="handleBackspace(this)" required>

        <label class="fancy-label" for="fancy-threeDigitInput">Fancy 3-Digit Input (X-Y-Z):</label>
        <input class="fancy-input" type="text" id="fancy-threeDigitInput" name="fancy-threeDigitInput" placeholder="X-Y-Z" pattern="\d-\d-\d" oninput="formatThreeDigitInput(this)" onkeydown="handleBackspace(this)" required>

        <button class="fancy-button" type="submit">Submit</button>
    </form>

    <!-- Display Table -->
    <table class="fancy-table" id="resultTable">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Expiry Date</th>
                <th>NIC Number</th>
                <th>3-Digit Input</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows will be dynamically added here -->
        </tbody>
    </table>

    <script>
        function formatDateInput(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            if (value.length > 8) {
                value = value.substring(0, 8);
            }
            if (value.length >= 4) {
                value = value.substring(0, 4) + '-' + value.substring(4, 6) + '-' + value.substring(6);
            }
            input.value = value;
        }

        function formatNicInput(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters

            if (value.length > 16) {
                value = value.substring(0, 16);
            }

            if (value.length >= 3 && value.length < 6) {
                value = value.substring(0, 3) + '-' + value.substring(3);
            } else if (value.length >= 6 && value.length < 9) {
                value = value.substring(0, 3) + '-' + value.substring(3, 6) + '-' + value.substring(6);
            } else if (value.length >= 9 && value.length < 12) {
                value = value.substring(0, 3) + '-' + value.substring(3, 6) + '-' + value.substring(6, 9) + '-' + value.substring(9);
            } else if (value.length >= 12) {
                value = value.substring(0, 3) + '-' + value.substring(3, 6) + '-' + value.substring(6, 9) + '-' + value.substring(9, 12) + '-' + value.substring(12);
            }

            input.value = value;
        }

        function formatThreeDigitInput(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            if (value.length > 3) {
                value = value.substring(0, 3);
            }
            if (value.length >= 2) {
                value = value.substring(0, 1) + '-' + value.substring(1, 2) + '-' + value.substring(2);
            }
            input.value = value;
        }

        function handleBackspace(input) {
            if (event.key === 'Backspace') {
                let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                input.value = value.substring(0, value.length - 1);
                // Trigger the respective formatting function based on the input ID
                switch (input.id) {
                    case 'fancy-expiryDate':
                        formatDateInput(input);
                        break;
                    case 'fancy-nicNumber':
                        formatNicInput(input);
                        break;
                    case 'fancy-threeDigitInput':
                        formatThreeDigitInput(input);
                        break;
                    default:
                        break;
                }
                event.preventDefault(); // Prevent the default backspace behavior
            }
        }
    </script>
</body>
</html>

<?php include('partials-usr/footer.php'); ?>
