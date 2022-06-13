<!doctype html>
<html lang="en">
<?php
include 'base.php';
include 'includes/head.php';

?>
  <?php
    ini_set('display_errors', 1);

    include '../classes/Database.php';


?>
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

            echo " <tr id='$item_id'>
            <th>".$row["item_id"]."</th>
            <td>".$row["item_name"]."</td>
            <td>".$row["stock"]."</td>
            <td>".$row["price"]."</td>
            <td><a type=\"submit\" class=\"btn btn-primary\"  name=\"update\" onclick =\"update()\">Update Item</a></td>
            <td><button type=\"button\" class=\"btn btn-secondary\" name=\"Delete\" onclick=\"delete_item()\">Delete Item</button></td>
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
          function update(){
            var rowId = event.target.parentNode.parentNode.id;
           //alert(rowId);
            window.location.href = "form_inventory.php?item="+rowId;
          }
          function delete_item(){
            var rowId = event.target.parentNode.parentNode.id;
           //alert(rowId);
            window.location.href = "form_inventory.php?item="+rowId;
          }
        </script> 
   
<form>
    <a type="submit" class="btn btn-primary" href ="form_inventory.php">ADD ITEM</a>
</form>

  </div>
</section>


<?php
  include 'includes/footer.php';
?>

   
    