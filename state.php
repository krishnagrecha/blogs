<?php
include "db.php";
include "header.php";
$sql = "SELECT state.*, countries.name AS country_name FROM state JOIN countries ON state.country_id = countries.id ORDER BY state.name ASC";
$result = $conn->query($sql);
?>
<div class="card shadow p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="flex-grow-1 text-center m-0">States</h1>
        <a href="createstate.php" class="btn btn-success">Create New</a>
    </div>
    <table class="table table-hover text-center">
        <thead><tr><th>Name</th><th>Country</th><th>Status</th><th>Action</th></tr></thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['country_name']; ?></td>
                <td><?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <a href="showstate.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Show</a>
                    <a href="editstate.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletestate.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>

