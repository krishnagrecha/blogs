<?php
include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM state WHERE id=$id";
    $conn->query($sql);
}
header("Location: state.php");
exit();
?>

