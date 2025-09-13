<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO blog_authors (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql)) {
        header("Location: authors.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Create Author</h4>
        <a href="authors.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>
