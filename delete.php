<?php
$db = new mysqli("localhost", "root", "abhinav", "new_database");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$id = $_GET["id"];

$query = "DELETE FROM uploaded_data WHERE id = '$id'";
$result = $db->query($query);

$db->close();

if ($result) {
    header("Location: upload_form.php"); 
    exit();
} else {
    echo "Deletion failed.";
}
?>
