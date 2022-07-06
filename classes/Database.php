<?php

class Database
{
     public static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "inventory_system";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        return $conn;
    
    }
}
