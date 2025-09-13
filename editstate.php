<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM state WHERE id=$id");
$state = $result->fetch_assoc();
$countries = $conn->query("SELECT * FROM countries WHERE active=1 ORDER BY name ASC");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $country_id = $_POST['country_id'];
    $active = $_POST['active'];
    $sql = "UPDATE state SET name='$name', country_id='$country_id', active='$active' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: state.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit State</h4>
        <a href="state.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3"><label>State Name</label><input type="text" name="name" class="form-control" value="<?= $state['name']; ?>" required></div>
            <div class="mb-3">
                <label>Country</label>
                <select name="country_id" class="form-select" required>
                     <?php while ($country = $countries->fetch_assoc()) {
                        $selected = ($country['id'] == $state['country_id']) ? 'selected' : '';
                        echo "<option value='{$country['id']}' $selected>{$country['name']}</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Status</label><br><input type="radio" name="active" value="1" <?= ($state['active'] == 1) ? 'checked' : ''; ?>> Active <input type="radio" name="active" value="0" <?= ($state['active'] == 0) ? 'checked' : ''; ?>> Inactive</div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

