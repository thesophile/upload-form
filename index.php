<!DOCTYPE html>
<html>
<head>
    <title>Todo List App</title>
</head>
<body>
    <h1>Todo List</h1>

    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>

    <?php
    // Display tasks from the database
    $conn = new mysqli("localhost", "root", "abhinav", "new_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["task"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No tasks yet.";
    }

    $conn->close();
    ?>
</body>
</html>
