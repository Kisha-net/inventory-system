<?php
include 'classes/Database.php';

$conn = Database::connect();
// $obj = new Database();
// $conn = $obj->connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Success";
}

