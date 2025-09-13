
 <?php
include "db.php";
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    $sql = "INSERT INTO blog_categories (name, slug) VALUES ('$name', '$slug')";

    if ($conn->query($sql)) {
        header("Location: category.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header ">
            <div class="d-flex justify-content-between align-items-center">
            <h4>Create Category</h4>
            <a href="category.php" class="btn btn-secondary">Back</a>
</div>
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

                <button type="submit" class="btn btn-success">Update</button>
                <!-- <a href="index.php" class="btn btn-secondary">Back</a> -->
            </form>
        </div>
    </div>
</div>

</body>
</html>
