<!DOCTYPE html>
<html lang="en">
<?
include 'includes/head.php';
?>
<body>

    <button id="button"> &#x2630;</button>

    <nav id="nav">
        <ul>
        <   <li><a href="index.php">Home</a></li>
            <li><a href="signup.php" target="_blank">SignUp</a></li>
            <li><a href="loginM.php" target="_blank">Login</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>

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
          <th scope="col">Item Id</th>
          <th scope="col">Item Name</th>
          <th scope="col">Product ID</th>
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


    <script>

        const btn = document.getElementById('button');
        const nav = document.getElementById('nav');

        btn.addEventListener('click', () => {

            nav.classList.toggle('active');
            btn.classList.toggle('active');

        })

       
        
        



    </script>

</body>

</html>