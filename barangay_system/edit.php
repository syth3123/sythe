<?php
include 'db.php';

// Check if ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No ID provided.");
}

$id = intval($_GET['id']);

// Fetch resident details
$sql = $conn->prepare("SELECT * FROM residents WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows == 0) {
    die("Error: Resident not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resident</title>
</head>
<body>
    <h2>Edit Resident</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']); ?>" required><br>
        
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']); ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>

<?php
$sql->close();
$conn->close();
?>

