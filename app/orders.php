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

<section class="container-fluid bg row justify-content-center">
  <div class="col-8">
	  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order Name</th>
          <th scope="col">Order Date</th>
          <th scope="col">Item Id</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            $order_id = $row["order_id"];
            $order_name = $row["order_name"];
            $order_date = $row["order_date"];
            $itemid = $row["itemid"];


            echo " <tr>
              <td>".$row["order_id"]."</td>
              <td>".$row["order_name"]."</td>
              <td>".$row["order_date"]."</td>
              <td>".$row["itemid"]."</td>
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