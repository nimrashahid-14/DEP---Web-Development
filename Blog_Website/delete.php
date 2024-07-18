// posts/delete.php
<?php
include '../includes/db.php';
$id = $_POST['id'];
$sql = "DELETE FROM posts WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
