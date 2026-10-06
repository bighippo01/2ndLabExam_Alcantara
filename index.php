<?php
session_start();
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM pets");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pet Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background: #333;
            color: white;
        }
        a {
            text-decoration: none;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<h1>Pet Management</h1>
<p>
    Welcome, <?php echo $_SESSION['username']; ?>!
    |
    <a href="logout.php">Logout</a>
</p>
<a href="create.php">Add New Pet</a>
<br><br>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Breed</th>
        <th>Age</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($pet = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $pet['id']; ?></td>
        <td><?php echo $pet['name']; ?></td>
        <td><?php echo $pet['breed']; ?></td>
        <td><?php echo $pet['age']; ?></td>
        <td><?php echo $pet['status']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $pet['id']; ?>">
                Edit
            </a>
            <a
                href="delete.php?id=<?php echo $pet['id']; ?>"
                onclick="return confirm('Delete this pet?');">
                Delete
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>

