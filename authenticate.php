<?php
include 'connection.php';

$email=$_POST["email"]; 
$password=$_POST["password"] ;

// echo $password;
// echo $email;

$query = "SELECT * FROM users;
$result = mysqli_query($conn,$query);

if ($result){
    while($row=mysqli_fetch_assoc($result)){

        -- $mail=$row["email_address"];
        $pass =$row["password"];
        echo $mail.':'.$pass;
    }
    

}else
{
   echo "Failure";
}


?>