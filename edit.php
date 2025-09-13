<?php
include "db.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blogs WHERE id=$id");
$blog = $result->fetch_assoc();

// Fetch data for dropdowns
$authors = $conn->query("SELECT * FROM blog_authors ORDER BY name ASC");
$categories = $conn->query("SELECT * FROM blog_categories ORDER BY name ASC");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $page_title = $_POST['page_title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    $sql = "UPDATE blogs SET title='$title', page_title='$page_title', content='$content', author_id='$author_id', category_id='$category_id', status='$status' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Blog Post</h4>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?= $blog['title']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Page Title</label>
                    <input type="text" name="page_title" class="form-control" value="<?= $blog['page_title']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Author</label>
                    <select name="author_id" class="form-select" required>
                        <?php while ($author = $authors->fetch_assoc()) {
                            $selected = ($author['id'] == $blog['author_id']) ? 'selected' : '';
                            echo "<option value='{$author['id']}' $selected>{$author['name']}</option>";
                        } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <?php while ($category = $categories->fetch_assoc()) {
                            $selected = ($category['id'] == $blog['category_id']) ? 'selected' : '';
                            echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5"><?= $blog['content']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label><br>
                <input type="radio" name="status" value="1" <?= ($blog['status'] == 1) ? 'checked' : ''; ?>> Active
                <input type="radio" name="status" value="0" <?= ($blog['status'] == 0) ? 'checked' : ''; ?>> Inactive
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>
