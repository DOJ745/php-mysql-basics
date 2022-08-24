<?php
declare(strict_types=1);

namespace src;

use mysqli;
require_once "main_info.php";

class DbSettings
{
    // Create connection (enable mysqli ext in php.ini FIRST)
    public function createConnection($dbName = ""): mysqli {
        return new mysqli(SERVERNAME, USERNAME, PASSWORD, $dbName, PORT);
    }
}