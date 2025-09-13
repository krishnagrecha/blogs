<?php
include "db.php";
include 'header.php';
$id = $_GET['id'];
$sql = "SELECT s.*, c.name as country_name FROM state s JOIN countries c ON s.country_id = c.id WHERE s.id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View State</h4>
        <a href="state.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> <?= $row['id']; ?></p>
        <p><strong>Name:</strong> <?= $row['name']; ?></p>
        <p><strong>Country:</strong> <?= $row['country_name']; ?></p>
        <p><strong>Status:</strong> <?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></p>
    </div>
</div>
</div>
</body>
</html>

