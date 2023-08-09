<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: upload.php"); 
    exit();
}

$db = new mysqli("localhost", "root", "abhinav", "new_database");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $db->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: upload.php"); 
            exit();
        } else {
            $loginError = "Invalid password.";
        }
    } else {
        $loginError = "User not found.";
    }
}

$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if (!empty($loginError)) { echo "<p>$loginError</p>"; } ?>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>
