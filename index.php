 <?php
ini_set('display_errors', 1);

include 'classes/Database.php';

$conn = Database::connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Success";
}  


