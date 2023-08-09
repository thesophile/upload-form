<!DOCTYPE html>
<html>
<head>
    <title>Upload Data</title>
</head>
<body>
    <h1>Upload Data</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" rows="4" cols="50" required></textarea><br><br>
        
        <label for="file">Upload File:</label>
        <input type="file" name="file"><br><br>
        
        <button type="submit" name="submit">Upload</button>
    </form>

    <br>

    <a href="upload_form.php">View uploaded data</a>
    

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    
    $db = new mysqli("localhost", "root", "abhinav", "new_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "INSERT INTO uploaded_data (name, subject, description) VALUES ('$name', '$subject', '$description')";
    $result = $db->query($query);

    $db->close();

    header("Location: upload_form.php"); 
    exit();
}
?>

