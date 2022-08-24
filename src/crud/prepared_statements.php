<?php

namespace crud;

use src\DbSettings;
require_once "../DbSettings.php";

$dbSettings = new DbSettings();
$conn = $dbSettings->createConnection(DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
// Binding strings (s)
// s - string
// i - integer
// d - double
// b - BLOB
$stmt->bind_param("sss", $firstname, $lastname, $email);

$firstname = "Prepared";
$lastname = "John";
$email = "john@example.com";

if($stmt->execute() === true) {
    echo "New record created successfully";
}
else {
    echo "Error: " . $stmt->error_list;
}

$stmt->close();
$conn->close();