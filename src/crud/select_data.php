<?php

namespace crud;

use src\DbSettings;
require_once "../DbSettings.php";

$dbSettings = new DbSettings();
$conn = $dbSettings->createConnection(DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname, id FROM MyGuests";
$sqlWhere = "SELECT firstname, lastname, id FROM MyGuests where lastname='Doe'";
$sqlOrderBy = "SELECT firstname, lastname, id FROM MyGuests order by firstname";
$sqlLimit = "SELECT * FROM MyGuests LIMIT 1 OFFSET 2";
$sqlLimitAlt = "SELECT * FROM MyGuests LIMIT 2, 1"; // The same as $sqlLimit

$result = $conn->query($sqlLimit);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "ID: " . $row['id'] . " - Name: " . $row['firstname'] . " " . $row['lastname'] . "<br/>";
    }
}
else{
    echo "0 results";
}

$conn->close();
