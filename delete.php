<?php
session_start();
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
mysqli_query(
    $conn,
    "DELETE FROM pets WHERE id=$id"
);
header("Location: index.php");
exit();
?>

