<?php
include 'base.php';
include '../classes/Database.php';


$customer_id = '';
if(isset($_GET["customer"])){
    $customer_id =$_GET["customer"] ;
}

if($customer_id ==''){
$action="add_customer";
$names ='';
$email = '';
}else{
    $action="update_customer";
        $conn = Database::connect(); 
        $sql = "SELECT * FROM customers WHERE customer_id ='$customer_id' ";
        $result = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
              $customer_id = $row["customer_id"];
              $names = $row["names"];
              $email = $row["email"];
            
    }
    }


?>
    <div class="col-6 items">
    <form action="../forms.php" method="post">
        <input type="hidden" value="InventoryCustomer" name="object">
        <input type="hidden" value="<?=$customer_id;?>" name="customer_id">
        <input type="hidden" value="<?=$action;?>" name="action">
        <div class="form-group">
        <label for="customername"> Customer names </label>
        <input type="text" class="form-control" value="<?=$names;?>" id="customername" required name ="names">
        </div>
        <div class="form-group">
        <label for="price">Customer Email</label>
        <input type="email" class="form-control" value="<?=$email;?>" required name ="email" id="email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</section>
