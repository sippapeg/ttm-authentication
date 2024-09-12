<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .otp-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .otp-input {
            font-size: 18px;
            text-align: center;
            width: 2em;
            margin: 0 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="otp-container">
    <h2>Enter OTP</h2>
    <form id="otp-form" action="submit_otp.php" method="post">
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp1" required>
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp2" required>
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp3" required>
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp4" required>
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp5" required>
        <input type="number" class="otp-input" min="0" max="9" maxlength="1" name="otp6" required>
        <br>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>

<script>
    const inputs = document.querySelectorAll('.otp-input');
    inputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
    });
</script>

</body>
</html>
