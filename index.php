<?php
include "db.php";
include "header.php";
// Join tables to get author and category names
$sql = "SELECT blogs.*, blog_authors.name AS author_name, blog_categories.name AS category_name 
        FROM blogs
        JOIN blog_authors ON blogs.author_id = blog_authors.id
        JOIN blog_categories ON blogs.category_id = blog_categories.id
        ORDER BY blogs.id DESC";
$result = $conn->query($sql);
?>
<div class="card shadow p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="flex-grow-1 text-center m-0">Blogs</h1>
        <a href="create.php" class="btn btn-success">Create New</a>
    </div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>
                <th>Views</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['author_name']; ?></td>
                <td><?= $row['category_name']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['views']; ?></td>
                <td><?= $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <a href="show.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Show</a>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deleteblog.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
