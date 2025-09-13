<?php
include "db.php";
include 'header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blog_authors WHERE id=$id");
$row = $result->fetch_assoc();
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View Author</h4>
        <a href="authors.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> <?= $row['id']; ?></p>
        <p><strong>Name:</strong> <?= $row['name']; ?></p>
        <p><strong>Email:</strong> <?= $row['email']; ?></p>
    </div>
</div>
</div>
</body>
</html>

