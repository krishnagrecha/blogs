<?php
include "db.php";
$states = $conn->query("SELECT * FROM state WHERE active=1 ORDER BY name ASC");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $state_id = $_POST['state_id'];
    $active = $_POST['active'];
    $sql = "INSERT INTO city (name, state_id, active) VALUES ('$name', '$state_id', '$active')";
    if ($conn->query($sql)) {
        header("Location: city.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Create City</h4>
        <a href="city.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>City Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">  
                <label>State</label>
                <select name="state_id" class="form-select" required>
                    <option value="">Select State</option>
                    <?php while ($state = $states->fetch_assoc()) { ?>
                        <option value="<?= $state['id']; ?>"><?= $state['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label><br>
                <input type="radio" name="active" value="1" checked> Active
                <input type="radio" name="active" value="0"> Inactive
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

