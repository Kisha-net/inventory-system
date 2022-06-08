<?php
include 'Database.php';

class InventoryItem{
    public function addItem(){
        $conn = Database::connect();
        // $item_id=$_POST["item_id"];
        $item_name=$_POST["item_name"];
        $stock=$_POST["stock"];
        $price=$_POST["price"];
        

        $sql = "INSERT INTO items (item_name,price,stock)
        VALUES ('$item_name' ,'$price','$stock')";

    $sql = "SELECT * FROM items";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
           echo " <tr>
            <th>".$row["item_id"]."</th>
            <td>".$row["item_name"]."</td>
            <td>".$row["stock"]."</td>
            <td>".$row["price"]."</td>
          </tr>";
            
        }

    if($conn->query($sql) === TRUE) {

        echo "New record created successfully";
        // header("location:../app/inventory_item.php");
    } 
    else{
        // header("location:app/signup.php?error=Duplicate email");
        echo "Could not add a record";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    else{
        echo "No records Found";
    }
    } 
}
        
