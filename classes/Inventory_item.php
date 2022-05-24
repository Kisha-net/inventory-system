<?php
include '../classes/Database.php';

$object=$_POST["object"];
$action=$_POST["action"];

if($object == "Inventory_item"){
    include 'classes/Inventory_item.php';
    $obj=new InventoryItem();

    switch($action){
        case'addItem':
            $obj->addItem();
            break;
            
        // case'updateItem':
        //     $obj->updateItem();
        //     break;

        // case'deleteItem':
        //     $obj->deleteItem();
        //     break;

        default:
            echo "Your favorite color is neither red, blue, nor green!";

    }
}
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
