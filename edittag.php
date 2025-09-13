<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blog_tags WHERE id=$id");
$tag = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $sql = "UPDATE blog_tags SET name='$name', slug='$slug', description='$description' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: tags.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Tag</h4>
        <a href="tags.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="<?= $tag['name']; ?>" required></div>
            <div class="mb-3"><label>Slug</label><input type="text" name="slug" class="form-control" value="<?= $tag['slug']; ?>" required></div>
            <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"><?= $tag['description']; ?></textarea></div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

