<?php
include 'Database.php';

class InventoryOrder{
    public function add_order(){
        $conn = Database::connect();

        // Get all parameters passed by POST request 
        $customer_id=$_POST["customer_name"];
        $delivery_date = $_POST["delivery_date"];
        $order_total = $_POST["total"];
        $item = $_POST["item[]"];
        $price = $_POST["price[]"];
        $quantity = $_POST["quantity[]"];
        $item_total = $_POST["total[]"];
        $order_date = $_POST["order_date"];
        
        // Insert items in order table and get order_id
        $customer_name = $_POST["customer_name"];

        $item_id=$_POST["items_"];
       
        
        $order_name = $_POST["order_name"];
      

       
        $query_name = "SELECT item_name FROM items WHERE item_id='$item_id'";
        $result_name = mysqli_fetch_assoc( $conn->query($query_name));
        $order_name = $result_name['item_name'];

        
        $sql = "INSERT INTO orders (order_name,customer_name,customer_id,order_date,delivery_date,order_total,item,price,quantity)
        VALUES ('$order_name','$customer_name','$customer_id','$order_date' ,'$delivery_date','$order_total','$item','$price','$quantity','$item_total')";
       

     
     // Loop through the array of items and insert them into order_items table
       

      



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
        $customer_name = $_POST["customer_name"];

        $sql = "UPDATE orders
        SET order_id ='$order_id', order_name = '$order_name' ,order_date='$order_date' ,'price' = '$price','customer_name' = '$customer_name'
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
        $order_id=$_GET["order_id"];
       

        $sql = "DELETE FROM orders
        WHERE $order_id = '{$order_id}'";
        
        

        if($conn->query($sql) === TRUE) {
            header("location:app/orders.php?success=Success");
            // echo "delete";
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}
?>
   
