<?php
include 'Database.php';
class Authenticate
{    
    public function signup(){
        $conn = Database::connect();
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"]; 


        $sql = "INSERT INTO users (username,useremail,userpwd)
        VALUES ('$username', '$email', '$password')";

        
        if($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        $conn->close();
    }

    public function login(){
        $conn = Database::connect();
        $email=$_POST["email"];
        $password=$_POST["password"]; 

        $sql = "SELECT * FROM users WHERE useremail ='{$email}' LIMIT 1";
        $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['userpwd'] == $password){
            echo "Login Succesful";
        }
        else{
            echo "Incorrect password";
        }
      } 
      else {
           echo "User does not exist";   
      }

    }

}





    