<?php

namespace crud;

use src\DbSettings;
require_once "../DbSettings.php";

$dbSettings = new DbSettings();
$conn = $dbSettings->createConnection(DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE MyGuests SET firstname = 'Michael', lastname = 'Bay' where id = 10";

if($conn->query($sql) === true){
    echo "Record updated successfully";
}
else{
    echo "Error updating record: " . $conn->error;
}

$conn->close();