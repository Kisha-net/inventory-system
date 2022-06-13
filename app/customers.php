<?php
    include 'base.php';
?>

<!-- <section class="container-fluid bg row justify-content-center format"> -->
  <div class="col-8">
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
            $name = $row["name"];
            $email = $row["email"];
           


            echo " <tr>
              <td>".$row["customer_id"]."</td>
              <td>".$row["name"]."</td>
              <td>".$row["email"]."</td>
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