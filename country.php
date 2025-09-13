<?php
include "db.php";
include "header.php";
$result = $conn->query("SELECT * FROM countries ORDER BY name ASC");
?>
<div class="card shadow p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="flex-grow-1 text-center m-0">Countries</h1>
        <a href="createcountry.php" class="btn btn-success">Create New</a>
    </div>
    <table class="table table-hover text-center">
        <thead><tr><th>Name</th><th>Alpha 2</th><th>Calling Code</th><th>Status</th><th>Action</th></tr></thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['alpha_2_code']; ?></td>
                <td><?= $row['calling_code']; ?></td>
                <td><?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <a href="showcountry.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Show</a>
                    <a href="editcountry.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletecountry.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>

