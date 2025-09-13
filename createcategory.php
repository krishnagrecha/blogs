<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $sql = "INSERT INTO blog_categories (name, slug) VALUES ('$name', '$slug')";
    if ($conn->query($sql)) {
        header("Location: category.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Create Category</h4>
        <a href="category.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

