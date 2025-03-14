<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];

    $sql = $conn->prepare("INSERT INTO residents (first_name, last_name, birth_date, address, contact_number) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $first_name, $last_name, $birth_date, $address, $contact_number);

    if ($sql->execute()) {
        echo "Resident added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
?>
