<?php
include 'Database.php';

class InventoryCustomer{
    public function add_customer(){
        $conn = Database::connect();
        // $customer_id=$_POST["customer_id"];
        $names=$_POST["names"];
        $email=$_POST["email"];
        

        $sql = "INSERT INTO customers (names,email)
      VALUES ('$names','$email')";

        if($conn->query($sql) === TRUE) {

            echo "New record created successfully";
            header("location:app/customers.php");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function update_customer(){
        $conn = Database::connect();
        $customer_id=$_POST["customer_id"];
        $names=$_POST["names"];
        $email=$_POST["email"];

        $sql = "UPDATE customers
        SET names='$names', email = '$email' 
        WHERE customer_id = '$customer_id'";
        

        if($conn->query($sql) === TRUE) {
            header("location:app/customers.php?success=Success");
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not add a record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 

    public function delete_customer(){
        $conn = Database::connect();
        $customer_id=$_GET["customer_id"];
      

       $sql="DELETE FROM customers
       WHERE customer_id ='{$customer_id}'";
       
        

        if($conn->query($sql) === TRUE) {

            // header("location:app/customers.php?success=Success");
           echo "success";
        } 
        else{
            // header("location:app/signup.php?error=Duplicate email");
            echo "Could not delete record";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}
        
