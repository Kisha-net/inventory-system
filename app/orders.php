<?php
include 'base.php';
?>
  <?php
    ini_set('display_errors', 1);

    include '../classes/Database.php';

    $conn = Database::connect(); 

    $sql = "SELECT * FROM item";
    $result = mysqli_query($conn,$sql);
?>

<section class="container-fluid bg row justify-content-center">
  <div class="col-8">
	  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order Name</th>
          <th scope="col">Item ID</th>
          <th scope="col">Price</th>
        <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            $item_id = $row["itemid"];
            $item_name = $row["itemname"];
            $product_id = $row["productid"];
            $item_status = $row["itemstatus"];

            echo " <tr>
              <td>".$row["itemid"]."</td>
              <td>".$row["itemname"]."</td>
              <td>".$row["productid"]."</td>
              <td></td>
              <td>".$row["itemstatus"]."</td>
            </tr>";
              
          }
        }
        else{
          echo "No records Found";
        }
        ?>

      </tbody>
    </table>
  </div>
</section>
<?php
  include 'includes/footer.php';
?>