<?php

namespace crud;

use src\DbSettings;
require_once "../DbSettings.php";

$dbSettings = new DbSettings();
$conn = $dbSettings->createConnection(DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Bob', 'Bobinsky', 'bobemail@gmail.com')";

if($conn->query($sql) === true) {
    //echo "New record created successfully";
    // Get last id
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();