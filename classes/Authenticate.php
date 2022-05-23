<?php
include 'Database.php';
class Authenticate
{    
    public function signup(){
        $conn = Database::connect();
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"]; 

        $hashpassword = password_hash($password,PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (username,useremail,userpwd)
        VALUES ('$username', '$email', '$hashpassword')";

        
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

        $hashpassword = password_hash($password,PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE useremail ='{$email}' LIMIT 1";
        $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$hashpassword)){
            session_start();
            $_SESSION["user_id"] =$row["user_id"];
            $_SESSION["username"] = $row["username"];
            echo "Login Succesful";
            echo "Welcome ".$_SESSION["username"];
        }
        else{
            echo "Incorrect password";
        }
      } 
      else {
           echo "User does not exist";   
      }

    }
    public function logout(){
        session_destroy();
        echo "Logging Out succcesful!";
    }

}





    