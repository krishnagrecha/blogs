<?php
include "db.php";
$countries = $conn->query("SELECT * FROM countries WHERE active=1 ORDER BY name ASC");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $country_id = $_POST['country_id'];
    $active = $_POST['active'];
    $sql = "INSERT INTO state (name, country_id, active) VALUES ('$name', '$country_id', '$active')";
    if ($conn->query($sql)) {
        header("Location: state.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Create State</h4>
        <a href="state.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3"><label>State Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="mb-3">
                <label>Country</label>
                <select name="country_id" class="form-select" required>
                    <option value="">Select Country</option>
                    <?php while ($country = $countries->fetch_assoc()) { ?>
                        <option value="<?= $country['id']; ?>"><?= $country['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Status</label><br><input type="radio" name="active" value="1" checked> Active <input type="radio" name="active" value="0"> Inactive</div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

