<?php
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