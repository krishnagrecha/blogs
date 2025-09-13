<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blog_categories WHERE id=$id");
$cat = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $sql = "UPDATE blog_categories SET name='$name', slug='$slug' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: category.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Category</h4>
        <a href="category.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= $cat['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="<?= $cat['slug'];?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

