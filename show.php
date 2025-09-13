<?php
include "db.php";
include "header.php";
$id = $_GET['id'];
$sql = "SELECT b.*, a.name as author_name, c.name as category_name FROM blogs b 
        JOIN blog_authors a ON b.author_id = a.id
        JOIN blog_categories c ON b.category_id = c.id
        WHERE b.id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View Blog Post</h4>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <h5><?= $row['title']; ?></h5>
        <p class="text-muted">By <?= $row['author_name']; ?> in <span class="badge bg-info"><?= $row['category_name']; ?></span></p>
        <hr>
        <p><strong>Page Title:</strong> <?= $row['page_title']; ?></p>
        <div>
            <strong>Content:</strong>
            <p><?= nl2br($row['content']); ?></p>
        </div>
    </div>
</div>
</div>
</body>
</html>
