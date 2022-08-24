<?php

namespace crud;

use src\DbSettings;
require_once "../DbSettings.php";

$dbSettings = new DbSettings();
$conn = $dbSettings->createConnection(DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM MyGuests where id = 12";

if ($conn->query($sql) === true) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();