<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task = $_POST["task"];

    $conn = new mysqli("localhost", "root", "abhinav", "new_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
