<?php
include "db.php";
include "header.php";
$sql = "SELECT city.*, state.name AS state_name FROM city JOIN state ON city.state_id = state.id ORDER BY city.name ASC";
$result = $conn->query($sql);
?>
<div class="card shadow p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="flex-grow-1 text-center m-0">Cities</h1>
        <a href="createcity.php" class="btn btn-success">Create New</a>
    </div>
    <table class="table table-hover text-center">
        <thead><tr><th>Name</th><th>State</th><th>Status</th><th>Action</th></tr></thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['state_name']; ?></td>
                <td><?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <a href="showcity.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Show</a>
                    <a href="editcity.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletecity.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>

