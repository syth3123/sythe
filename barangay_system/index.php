<?php
include 'db.php';
$result = $conn->query("SELECT * FROM residents");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barangay Residents</title>
</head>
<body>
    <h2>Add New Resident</h2>
    <form action="create.php" method="POST">
        First Name: <input type="text" name="first_name" required><br>
        Last Name: <input type="text" name="last_name" required><br>
        Birth Date: <input type="date" name="birth_date" required><br>
        Address: <input type="text" name="address" required><br>
        Contact Number: <input type="text" name="contact_number" required><br>
        <input type="submit" value="Add Resident">
    </form>

    <h2>Residents List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
                <td><?= $row['birth_date']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['contact_number']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

