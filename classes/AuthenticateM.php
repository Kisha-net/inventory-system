<?php
include 'Database.php';
class Authenticate
{
    public function authenticate($email, $password)
    {
        $fullname=$_POST["fullname"]; 
        $username=$_POST["username"];
        $email=$_POST["email"]; 
        $password=$_POST["password"];
        

        // if(emptyInputSignup() !== false){
        //     header("location:../assets/Scripts/signup.php");
        //     exit();
        // }
        // else
        // {
        //     header("location:../assets/Scripts/signup.php");
        // }


        $conn = $conn = Database::connect();
        $query = "SELECT * FROM users WHERE email ='$email' AND password ='$password' ";
        $result = mysqli_query($conn,$query);

        if($result){
            echo json_encode(mysqli_fetch_assoc($result));
        }
        else{
            echo "failure";
        }

    
        
    }

}