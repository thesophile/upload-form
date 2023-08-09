<?php
session_start();

$db = new mysqli("localhost", "root", "abhinav", "new_database");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$registrationError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = $db->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        $registrationError = "Registration failed: " . $db->error;
    }
}

$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="register">Register</button>
    </form>
    <?php if (!empty($registrationError)) { echo "<p>$registrationError</p>"; } ?>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>
