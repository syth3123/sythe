<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    $sql = $conn->prepare("UPDATE residents SET first_name=?, last_name=? WHERE id=?");
    $sql->bind_param("ssi", $first_name, $last_name, $id);

    if ($sql->execute()) {
        header("Location: index.php"); // Redirect after update
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $sql->close();
}
$conn->close();
?>




