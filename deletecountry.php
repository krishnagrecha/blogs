<?php
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM countries WHERE id=$id";
    $conn->query($sql);
}
header("Location: country.php");
exit();
?>

