<?php
ini_set('display_errors', 1);

$object=$_POST["object"];
$action=$_POST["action"];

if($object == "Authenticate"){
    include 'classes/Authenticate.php';
    $obj=new Authenticate();

    switch($action){
        case'signup':
            $obj->signup();
            break;
            
        case'login':
            $obj->login();
            break;

        default:
            echo "Your favorite color is neither red, blue, nor green!";

    }
}

else if($object == "InventoryItem"){
    include '../classes/Inventory_item.php';
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