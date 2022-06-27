<?php
include 'base.php';
?>
  <?php
    ini_set('display_errors', 1);

    include '../classes/Database.php';

    $conn = Database::connect(); 

    $sql = "SELECT * FROM orders";
    $result = mysqli_query($conn,$sql);
?>

<section class="container-fluid bg row justify-content-center format">
  <div class="col-8">
	  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order Name</th>
          <th scope="col">Order Date</th>
          <th scope="col">price</th>
          <th scope="col">customer ID</th>
        </tr>
      </thead>
      <tbody>
      <?php
      // $row = mysqli_fetch_array($result);
   
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            $order_id = $row["order_id"];
            $order_name = $row["order_name"];
            $order_date = $row["order_date"];
            $price = $row["price"];
            $customer_Id = $row["customer_id"];


            echo " <tr id='$order_id'>
              <td>".$row["order_id"]."</td>
              <td>".$row["order_name"]."</td>
              <td>".$row["order_date"]."</td>
              <td>".$row["price"]."</td>
              <td>".$row["customer_id"]."</td>
              <td><button type=\"submit\" class=\"btn btn-primary\"  name=\"update\" onclick =\"update_order()\">Update </button></td>
            <td><button type=\"button\" class=\"btn btn-secondary\" name=\"Delete\" onclick=\"delete_order()\">Delete</button></td>
            </tr>";
              
          }
        }
        else{
          echo "No records Found";
        }
        ?>

      </tbody>
    </table>
    <form>
    <a type="submit" class="btn btn-primary" href ="order_inventory.php"
    
    >ADD ORDER</a>
</form>
  </div>
  <script>
          function update_order(){
            var rowId = event.target.parentNode.parentNode.id;
           alert(rowId);
            window.location.href = "order_inventory.php?order="+rowId;
          }
          function delete_order(){
            var rowId = event.target.parentNode.parentNode.id;
          //  alert(rowId);
            window.location.href = "order_inventory.php?order="+rowId;
          }
        </script> 
</section>
<?php
  include 'includes/footer.php';
?>