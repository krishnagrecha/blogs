<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $sql = "INSERT INTO blog_tags (name, slug, description) VALUES ('$name', '$slug', '$description')";
    if ($conn->query($sql)) {
        header("Location: tags.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Create Tag</h4>
        <a href="tags.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="mb-3"><label>Slug</label><input type="text" name="slug" class="form-control" required></div>
            <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

