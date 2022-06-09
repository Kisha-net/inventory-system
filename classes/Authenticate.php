<?php
include 'Database.php';

class Authenticate
{    
        public function signup(){
            $conn = Database::connect();
            $username=$_POST["username"];
            $email=$_POST["email"];
            $password=$_POST["password"]; 
            $passwordRepeat=$_POST["passwordRepeat"]; 
        

             $hashpassword = password_hash($password,PASSWORD_DEFAULT);
             $hashpasswordrepeat = password_hash($passwordRepeat,PASSWORD_DEFAULT);
        

            $sql = "INSERT INTO users (username,useremail,userpwd,passwordRepeat)
            VALUES ('$username', '$email', '$hashpassword','$hashpasswordrepeat')";

            
            if($conn->query($sql) === TRUE) {

                // echo "New record created successfully";
                header("location:app/login.php");
            } 
            else{
                header("location:app/signup.php?error=Duplicate email");
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
            if(password_verify($password,$row['userpwd'])){
                session_start();
                $_SESSION["user_id"] =$row["user_id"];
                $_SESSION["username"] = $row["username"];
                echo "Login Succesful";
                echo "Welcome ".$_SESSION["username"];
                header("location:app/dashboard.php");
                
            }
            else{
                header("location:app/login.php?error=Incorrect Password");
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } 
        else {
             header("location:app/login.php?error=Unknown User");
                echo "Error: " . $sql . "<br>" . $conn->error;
        
        }

        }
    
        public function logout(){
            unset($_SESSION["user_id"]);
            unset($_SESSION["username"]);

            session_destroy();
            header("location:index.php");
        } 

        public function check_user_exist($conn,$email){
            $sql = "SELECT email FROM users WHERE useremail ='{$email}";
            $result = mysqli_query($conn,$sql) ;
                  if (mysqli_num_rows($result) > 0) {
                    echo "Username already exist";
                    header("location:../app/signup.php");
                  } else {
                        header("location:../app/base.php");
                  }
        }
  }
