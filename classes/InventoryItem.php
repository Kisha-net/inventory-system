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

        if($conn->query($sql) === TRUE) {

            echo "New record created successfully";
            header("location:app/inventory_items.php");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function updateItem(){
        $conn = Database::connect();
        $item_id=$_POST["item_id"];
        $item_name=$_POST["item_name"];
        $stock=$_POST["stock"];
        $price=$_POST["price"];

        $sql = "UPDATE items
        SET item_name ='$item_name', price = '$price' ,stock='$stock'
        WHERE item_id = '$item_id'";
        

        if($conn->query($sql) === TRUE) {

            header("location:app/inventory_items.php?success=Success");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function deleteItem(){
        $conn = Database::connect();
        $item_id=$_GET["item_id"];
        

        $sql = "DELETE FROM items
        WHERE item_id = '{$item_id}'";
        $result = mysqli_query($conn,$sql);

        if($conn->query($sql) === TRUE) {
            header("location:app/inventory_items.php?success=success");
        } 
        else{
            echo "Could not delete  record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        

    } 

    public function getItem(){
        $conn = Database::connect();
        $item_id=$_GET["item_id"];


        $sql = "SELECT * FROM items WHERE item_id = '{$item_id}' LIMIT 1 ";
        $result = mysqli_query($conn,$sql);

       
        if (mysqli_num_rows($result) > 0){
            $result=mysqli_fetch_assoc($result);
            echo $result['price'];
           
        }
    }
}
        
