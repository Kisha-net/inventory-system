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


$sql = "SELECT * FROM item";
$result = mysqli_query($conn,$sql);

// echo json_encode($result);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
       echo " <tr>
        <td>".$row["itemid"]."</td>
        <td>".$row["itemname"]."</td>
        <td>".$row["productid"]."</td>
        <td>".$row["itemstatus"]."</td>
      </tr>";
        
    }
}
else{
    echo "No records Found";
}


