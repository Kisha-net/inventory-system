<?php
    include 'base.php';
    include 'includes/head.php';
?>

<!-- <section class="container-fluid bg row justify-content-center format"> -->
  <div class="col-8 group">
	  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Customer ID</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer Email</th>
        </tr>
      </thead>
      <tbody>
      <?php
      include '../classes/Database.php';
      $conn = Database::connect(); 
      $sql = "SELECT * FROM customers";
      $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            $customer_id = $row["customer_id"];
            $names = $row["names"];
            $email = $row["email"];
            


            echo " <tr id='$customer_id'>
              <td>".$row["customer_id"]."</td>
              <td>".$row["names"]."</td>
              <td>".$row["email"]."</td>
              <td><button type=\"submit\" class=\"btn btn-primary\"  name=\"update\" onclick =\"update_customer()\">Update </button></td>
            <td><button type=\"submit\" class=\"btn btn-secondary deleteBtn\" name=\"Delete\" dataId=\"$customer_id\">Delete</button></td>
            </tr>";
              
          }
        }
        else{
          echo "No records Found";
        }
        ?>

      </tbody>
    </table>

    <script>
          function update_customer(){
            var rowId = event.target.parentNode.parentNode.id;
          //  alert(rowId);
            window.location.href = "customer_inventory.php?customer="+rowId+"&action='update_customer'" ;
          }
          </script>
    <form>
    <a type="submit" class="btn btn-primary" href ="customer_inventory.php">ADD CUSTOMER</a>
</form>
  </div>
<script>
  $(document).ready(function(){
    $(document).on('click',".deleteBtn",function(){
      var customer_id=$(this).attr("dataId");
      // alert(customer_id)
      $.get("../forms.php?object=InventoryCustomer&action=delete_customer&customer_id="+customer_id);
      location.reload(true);
    })
  })
</script>
<?php
  include 'includes/footer.php';
?>
</section>