<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blog_authors WHERE id=$id");
$auth = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE blog_authors SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: authors.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Author</h4>
        <a href="authors.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= $auth['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $auth['email'];?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

