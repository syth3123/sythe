<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare("DELETE FROM residents WHERE id=?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo "Resident deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
?>
