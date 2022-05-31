<?php
include 'Database.php';

class InventoryItem{
    public function addItem(){
        $conn = Database::connect();
        $itemid=$_POST["itemid"];
        $itemname=$_POST["itemname"];

        $sql = "INSERT INTO item (itemid,itemname)
        VALUES ('$itemid', '$itemname')";

    $sql = "SELECT * FROM item";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
           echo " <tr>
            <th>".$row["itemid"]."</th>
            <td>".$row["itemname"]."</td>
            <td>".$row["productid"]."</td>
            <td>".$row["itemstatus"]."</td>
          </tr>";
            
        }
    }
    else{
        echo "No records Found";
    }
    } 
}
        
//         if($conn->query($sql) === TRUE) {
//             echo "New item was created successfully";
//         } 
//         else{
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
            
//         $conn->close();

//     }
// }