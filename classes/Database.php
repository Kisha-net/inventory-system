<?php

class Database
{
     public static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "inventory_system";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        return $conn;
    
    }
}
