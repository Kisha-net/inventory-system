<br>
  <div class="form-group col-md-6">
      <!-- <div class="input-group mb-3"> -->
      <b><label for="price">Customer Name :</label><br></b>
        <?php
      // include '../classes/Database.php';
      $conn = Database::connect(); 
      $sql = "SELECT * FROM customers";
      $result = mysqli_query($conn,$sql);
      ?>
      <select class="form-control" class="custom-select" id="inputGroupSelect02">
      <?php
          while($row = mysqli_fetch_array($result)){
      ?>
        <option><?php echo $row["name"];?></option>
      <?php
        }
    ?>
    </select>
  </div>
      <div class="form-group ">
          <b><label for="order_date">order Date:</label></b>
          <input type="date" class="form-control"  required name ="order_date" id="order_date">
      </div>

    <div class="items form-row">
  <div class="items">
  
  <div class="d-flex justify-content-between align-items-center">
      <div>
        <h2>Total</h2>
      </div>
      <div >
        <h2>$<span id="total">0</span></h2>
      </div>