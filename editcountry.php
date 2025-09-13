<?php
include "db.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM countries WHERE id=$id");
$country = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $alpha_2_code = $_POST['alpha_2_code'];
    $alpha_3_code = $_POST['alpha_3_code'];
    $calling_code = $_POST['calling_code'];
    $active = $_POST['active'];
    $sql = "UPDATE countries SET name='$name', alpha_2_code='$alpha_2_code', alpha_3_code='$alpha_3_code', calling_code='$calling_code', active='$active' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: country.php");
        exit();
    }
}
include 'header.php';
?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Edit Country</h4>
        <a href="country.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="<?= $country['name']; ?>" required></div>
            <div class="mb-3"><label>Alpha 2 Code</label><input type="text" name="alpha_2_code" class="form-control" value="<?= $country['alpha_2_code']; ?>"></div>
            <div class="mb-3"><label>Alpha 3 Code</label><input type="text" name="alpha_3_code" class="form-control" value="<?= $country['alpha_3_code']; ?>"></div>
            <div class="mb-3"><label>Calling Code</label><input type="text" name="calling_code" class="form-control" value="<?= $country['calling_code']; ?>"></div>
            <div class="mb-3"><label class="form-label">Status</label><br><input type="radio" name="active" value="1" <?= ($country['active'] == 1) ? 'checked' : ''; ?>> Active <input type="radio" name="active" value="0" <?= ($country['active'] == 0) ? 'checked' : ''; ?>> Inactive</div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</body>
</html>

