<!DOCTYPE html>
<html>
<head>
    <title>Upload Data</title>
</head>
<body>

    <h2>Uploaded Data</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        $db = new mysqli("localhost", "root", "abhinav", "new_database");

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $query = "SELECT id, name, subject, description FROM uploaded_data";
        $result = $db->query($query);

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];
            $subject = $row["subject"];
            $description = $row["description"];
            
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$subject</td>";
            echo "<td>$description</td>";
            echo "<td><a href='edit.php?id=$id'>Edit</a> | <a href='delete.php?id=$id'>Delete</a></td>";
            echo "</tr>";
        }

        $db->close();
        ?>
    </table>

    <a href="upload.php">Add</a>
    <a href="logout.php">Logout</a>
</body>
</html>
