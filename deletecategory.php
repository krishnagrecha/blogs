<?php
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM blog_categories WHERE id=$id";
    $conn->query($sql);
}
header("Location: category.php");
exit();
?>

