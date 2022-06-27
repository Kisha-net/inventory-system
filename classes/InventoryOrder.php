<?php
include 'Database.php';

class InventoryOrder{
    public function add_order(){
        $conn = Database::connect();
        $order_id=$_POST["order_id"];
        $order_name = $_POST["order_name"];
        $order_date = $_POST["order_date"];
        $price = $_POST["price"];
        $customer_id = $_POST["customer_id"];

     
    
        $sql = "INSERT INTO orders (order_id,order_name,order_date,price,customer_id)
      VALUES ('$order_id','$order_name','$order_date' ,'$price' ,'$customer_id')";



        if($conn->query($sql) === TRUE) {

            echo "New record created successfully";
            header("location:app/orders.php");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function update_order(){
        $conn = Database::connect();
        $order_id=$_POST["order_id"];
        $order_name = $_POST["order_name"];
        $order_date = $_POST["order_date"];
        $price = $_POST["price"];
        $customer_id = $_POST["customer_id"];

        $sql = "UPDATE orders
        SET order_id ='$order_id', order_name = '$order_name' ,order_date='$order_date' ,'price' = '$price','customer_Id' = '$customer_id'
        WHERE $order_id = '$order_id'";
        

        if($conn->query($sql) === TRUE) {
            header("location:app/orders.php?success=Success");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function delete_order(){
        $conn = Database::connect();
        $order_id=$_POST["order_id"];
        $order_name = $_POST["order_name"];
        $order_date = $_POST["order_date"];
        $price = $_POST["price"];
        $customer_id = $_POST["customer_id"];

        $sql = "DELETE FROM orders
        SET order_id ='$order_id', order_name = '$order_name' ,order_date='$order_date' ,'price' = '$price','customer_Id' = '$customer_id'
        WHERE $order_id = '$order_id'";
        
        

        if($conn->query($sql) === TRUE) {
            // header("location:app/orders.php?success=Success");
            echo "delete";
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}
        
