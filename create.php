<?php
session_start();
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $sql = "INSERT INTO pets (name, breed, age, status)
            VALUES ('$name', '$breed', '$age', '$status')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Pet</title>
   <link rel="stylesheet" href="styles.css">
   
</head>

<body>
    <h1>Add New Pet</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <label>Breed:</label>
        <input type="text" name="breed" required>
        <br><br>
        <label>Age:</label>
        <input type="number" name="age" required>
        <br><br>
        <label>Status:</label>
        <input type="text" name="status" required>
        <br><br>
        <button type="submit" name="add"> Add Pet
        </button>
        <a href="index.php">Cancel</a>
    </form>
</body>

</html>