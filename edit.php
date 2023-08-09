<?php
$db = new mysqli("localhost", "root", "abhinav", "new_database");


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];

    $query = "UPDATE uploaded_data SET name = '$name', subject = '$subject', description = '$description' WHERE id = '$id'";
    $result = $db->query($query);

    if ($result) {
        header("Location: upload_form.php"); 
        exit();
    } else {
        $updateError = "Update failed: " . $db->error;
    }
} else {
    $id = $_GET["id"];

    $query = "SELECT name, subject, description FROM uploaded_data WHERE id = '$id'";
    $result = $db->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $subject = $row["subject"];
        $description = $row["description"];
    } else {
        $editError = "Data not found.";
    }
}

$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <?php if (isset($editError)) { echo "<p>$editError</p>"; } ?>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>
        
        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="<?php echo $subject; ?>" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" rows="4" cols="50" required><?php echo $description; ?></textarea><br><br>
        
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="upload_form.php">Back to Upload Form</a></p>
</body>
</html>
