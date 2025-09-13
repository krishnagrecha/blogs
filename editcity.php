<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM city WHERE id=$id");
$city = $result->fetch_assoc();
$states = $conn->query("SELECT * FROM state WHERE active=1 ORDER BY name ASC");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $state_id = $_POST['state_id'];
    $active = $_POST['active'];
    $sql = "UPDATE city SET name='$name', state_id='$state_id', active='$active' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: city.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit City</h4>
        <a href="city.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>City Name</label>
                <input type="text" name="name" class="form-control" value="<?= $city['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>State</label>
                <select name="state_id" class="form-select" required>
                     <?php while ($state = $states->fetch_assoc()) {
                        $selected = ($state['id'] == $city['state_id']) ? 'selected' : '';
                        echo "<option value='{$state['id']}' $selected>{$state['name']}</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label><br>
                <input type="radio" name="active" value="1" <?= ($city['active'] == 1) ? 'checked' : ''; ?>> Active
                <input type="radio" name="active" value="0" <?= ($city['active'] == 0) ? 'checked' : ''; ?>> Inactive
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

