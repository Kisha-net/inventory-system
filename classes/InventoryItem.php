<?php
include 'Database.php';

class InventoryItem{
    public function addItem(){
        $conn = Database::connect();
        $itemid=$_POST["itemid"];
        $itemname=$_POST["itemname"];

        $sql = "INSERT INTO item (itemid,itemname)
        VALUES ('$itemid', '$itemname')";

        
        if($conn->query($sql) === TRUE) {
            echo "New item was created successfully";
        } 
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        $conn->close();

    }
}
