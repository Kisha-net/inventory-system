<?php
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $object=$_POST["object"];
    $action=$_POST["action"];
  
}
else{
    $object=$_GET["object"];
    $action=$_GET["action"];
}


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
        
        case'logout':
            $obj->logout();
            break;

        default:
            echo "Your favorite color is neither red, blue, nor green!";

    }
}

if($object == "InventoryItem"){
    include 'classes/InventoryItem.php';
    $obj=new InventoryItem();

    switch($action){
        case 'addItem':
            $obj->addItem();
            break;
            
        case'updateItem':
            $obj->updateItem();
            break;

        // case'deleteItem':
        //     $obj->deleteItem();
        //     break;

        default:
            echo "Your favorite color is neither red, blue, nor green!";

    }
}