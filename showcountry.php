<?php
include "db.php";
include 'header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM countries WHERE id=$id");
$row = $result->fetch_assoc();
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View Country</h4>
        <a href="country.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> <?= $row['id']; ?></p>
        <p><strong>Name:</strong> <?= $row['name']; ?></p>
        <p><strong>Alpha 2 Code:</strong> <?= $row['alpha_2_code']; ?></p>
        <p><strong>Alpha 3 Code:</strong> <?= $row['alpha_3_code']; ?></p>
        <p><strong>Calling Code:</strong> <?= $row['calling_code']; ?></p>
        <p><strong>Status:</strong> <?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></p>
    </div>
</div>
</div>
</body>
</html>
