<?php
include "db.php";
include 'header.php';
$id = $_GET['id'];
$sql = "SELECT ci.*, s.name as state_name, co.name as country_name 
        FROM city ci 
        JOIN state s ON ci.state_id = s.id
        JOIN countries co ON s.country_id = co.id
        WHERE ci.id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View City</h4>
        <a href="city.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> <?= $row['id']; ?></p>
        <p><strong>Name:</strong> <?= $row['name']; ?></p>
        <p><strong>State:</strong> <?= $row['state_name']; ?></p>
        <p><strong>Country:</strong> <?= $row['country_name']; ?></p>
        <p><strong>Status:</strong> <?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></p>
    </div>
</div>
</div>
</body>
</html>

