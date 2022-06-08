<!doctype html>
<html lang="en">
<?php
include 'base.php';
?>
  <?php
    ini_set('display_errors', 1);

    include '../classes/Database.php';


?>

<section class="container-fluid bg row justify-content-center format"> 
  <div class="col-8">
	  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Item Id</th>
          <th scope="col">Item Name</th>
          <th scope="col">stock</th>
          <th scope="col">price</th>
        </tr>
      </thead>
       <tbody> 
       
      <?php
      
    $conn = Database::connect(); 
      
    $sql = "SELECT * FROM items";
    $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            $item_id = $row["item_id"];
            $item_name = $row["item_name"];
            $stock = $row["stock"];
            $price = $row["price"];

            echo " <tr>
            <th>".$row["item_id"]."</th>
            <td>".$row["item_name"]."</td>
            <td>".$row["stock"]."</td>
            <td>".$row["price"]."</td>
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
    <a type="submit" class="btn btn-primary" href ="form_inventory.php">ADD ITEM</a>
   
  </form>
  </div>
</section>


<?php
  include 'includes/footer.php';
?>

   
    