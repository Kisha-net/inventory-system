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

        if($password == $passwordRepeat){

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
        }else{
            header("location:app/signup.php?error=Passwords Do Not Match");
                // echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
                // echo "Login Succesful";
                // echo "Welcome ".$_SESSION["username"];
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
            // // include 'app/includes/head.php';
            // session_destroy();
            // header("location:app/login.php");
            include 'classes/Authenticate.php';
                session_start();
                if (isset($_SESSION['user_id'])) {
                    session_destroy();
                    header("location:app/login.php");
}
   

            
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
