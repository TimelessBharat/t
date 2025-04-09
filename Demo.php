<?php
// Initialize variables
$username = $email = $password = $confirm_password = "";
$error_message = "";
$success_message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $confirm_password = sanitize_input($_POST['confirm-password']);

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // If validation passes, simulate successful registration (e.g., save data to a database)
        // In a real application, you'd store the data in a database here

        // For this demo, we're simply displaying a success message
        $success_message = "Registration successful! Welcome, " . htmlspecialchars($username) . "!";
    }
}

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

/* Center the registration container */
.registration-container {
    width: 100%;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Heading style */
h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Form elements */
.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Button style */
button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Link style */
p {
    text-align: center;
    font-size: 14px;
}

p a {
    color: #007bff;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

/* Mobile responsiveness */
@media screen and (max-width: 480px) {
    .registration-container {
        width: 90%;
        padding: 15px;
    }
}
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Register Here!!!</h2>

        <!-- Display error or success messages -->
        <?php if (!empty($error_message)): ?>
            <div style="color: red; text-align: center; margin-bottom: 20px;">
                <?php echo $error_message; ?>
            </div>
        <?php elseif (!empty($success_message)): ?>
            <div style="color: green; text-align: center; margin-bottom: 20px;">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <form action="Demo.php" method="POST" id="registrationForm">
            <div class="input-group">
                <label for="username">Full Name:</label>
                <input type="text" id="username" name="username" placeholder="Enter your full name" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
