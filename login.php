<?php
// Simulated database (in a real application, this should be a database query)
$stored_email = "user@example.com";  // Replace with your actual email stored in DB
$stored_password = "password123";  // Replace with your hashed password stored in DB

// Initialize variables
$email = $password = "";
$error_message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error_message = "Please enter both email and password.";
    } elseif ($email != $stored_email || $password != $stored_password) {
        $error_message = "Invalid email or password.";
    } else {
        // If login is successful, start a session and redirect
        session_start();
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");  // Redirect to a dashboard page after successful login
        exit();
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
    <title>Login</title>
</head>
<style>
/* General page styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

/* Center the login container */
.login-container {
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
    .login-container {
        width: 90%;
        padding: 15px;
    }
}

</style>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Display error message if there's any -->
        <?php if (!empty($error_message)): ?>
            <div style="color: red; text-align: center; margin-bottom: 20px;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" id="loginForm">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="rb.html">Register here</a></p>
        </form>
    </div>
</body>
</html>
