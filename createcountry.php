<!-- id tag_id name slug description created at updated at -->
 
 <?php
include "db.php";
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];
    $alpha_2_code= $_POST['alpha_2_code'];
    $alpha_3_code=$_POST['alpha_3_code'];
    $calling_code= $_POST['calling_code'];
    $phone_num_length= $_POST['phone_num_length'];

    $sql = "INSERT INTO countries (name, alpha_2_code , alpha_3_code, calling_code, phone_num_length) VALUES ('$name', '$alpha_2_code', '$alpha_3_code', '$calling_code', '$phone_num_length' )";

    if ($conn->query($sql)) {
        header("Location: country.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header ">
            <div class="d-flex justify-content-between align-items-center">
            <h4>Create Country</h4>
            <a href="country.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Alpha_2_code</label>
                    <input type="text" name="alpha_2_code" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Alph_3_Code</label>
                    <input type="text" name="alpha_code_3" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Calling Code</label>
                    <input type="text" name="calling_code" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Phone number length</label>
                    <input type="text" name="phone_number_length" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label><br>
                    <input type="radio" name="status" value="1" checked> Active
                    <input type="radio" name="status" value="0"> Inactive
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <!-- <a href="index.php" class="btn btn-secondary">Back</a> -->
            </form>
        </div>
    </div>
</div>

</body>
</html>
