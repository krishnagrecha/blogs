<?php
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM city WHERE id=$id";
    $conn->query($sql);
}
header("Location: city.php");
exit();
?>

