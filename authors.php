<?php
include "db.php";
include "header.php";
$result = $conn->query("SELECT * FROM blog_authors ORDER BY id DESC");
?>
<div class="card shadow p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="flex-grow-1 text-center m-0">Authors</h1>
        <a href="createauthor.php" class="btn btn-success">Create New</a>
    </div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="showauthors.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Show</a>
                    <a href="editauthors.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deleteauthor.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
