<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register_process.php" method="POST">
    <label for="username">Username:</label>
        <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]{3,20}" title="Username must be alphanumeric and between 3 to 20 characters" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern=".{8,}" title="Password must be at least 8 characters" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
