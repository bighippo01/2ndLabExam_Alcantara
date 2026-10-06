<?php
session_start();
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $sql = "UPDATE pets SET
            name='$name',
            breed='$breed',
            age='$age',
            status='$status'
            WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
}
$result = mysqli_query(
    $conn,
    "SELECT * FROM pets WHERE id=$id"
);
$pet = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
   
    <title>Edit Pet</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Edit Pet</h1>
<form method="POST">
    <label>Name:</label>
    <input
        type="text"
        name="name"
        value="<?php echo $pet['name']; ?>"
        required>
    <br><br>
    <label>Breed:</label>
    <input
        type="text"
        name="breed"
        value="<?php echo $pet['breed']; ?>"
        required>
    <br><br>
    <label>Age:</label>
    <input
        type="number"
        name="age"
        value="<?php echo $pet['age']; ?>"
        required>
    <br><br>
    <label>Status:</label>
    <input
        type="text"
        name="status"
        value="<?php echo $pet['status']; ?>"
        required
    >
    <br><br>
    <button type="submit" name="update">
        Update Pet
    </button>
    <a href="index.php">Cancel</a>
</form>
</body>
</html>

