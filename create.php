<?php
include "db.php";

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

    $sql = "INSERT INTO blogs (title, page_title, content, author_id, category_id, status) VALUES ('$title', '$page_title', '$content', '$author_id', '$category_id', '$status')";

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
        <h4>Create Blog Post</h4>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Page Title</label>
                    <input type="text" name="page_title" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Author</label>
                    <select name="author_id" class="form-select" required>
                        <option value="">Select Author</option>
                        <?php while ($author = $authors->fetch_assoc()) { ?>
                            <option value="<?= $author['id']; ?>"><?= $author['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        <?php while ($category = $categories->fetch_assoc()) { ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label><br>
                <input type="radio" name="status" value="1" checked> Active
                <input type="radio" name="status" value="0"> Inactive
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>
