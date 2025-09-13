<?php
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM blog_tags WHERE id=$id";
    $conn->query($sql);
}
header("Location: tags.php");
exit();
?>

