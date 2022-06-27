<?php
include 'base.php';
include '../classes/Database.php';
?>


<form action="../forms.php" method="post">
  <div class=" items form-row">
  <input type="hidden" value="InventoryOrder" name="object">
  <input type="hidden"  name="order_id">
  <input type="hidden"  name="action">
          
  <div class="row">
      <div class="col">
          <b><label for="Item">Item</label></b>
      </div>
      <div class="col">
        <b><label for="price">Price</label></b>
      </div>
      <div class="col">
        <b><label for="quantity">Quantity</label></b>
      </div>
      <div class="col">
        <b><label for="total">Total</label></b>
      </div>
      <div class="col">
        <b><label for="Item">Action</label></b>
      </div>

    <div class="form-row template" id="form" name="form" dataCount="1">
      <div class="col">
            <?php
          $conn = Database::connect(); 
          $sql = "SELECT * FROM items";
          $result = mysqli_query($conn,$sql);
          ?>
            <tr>
          <td>
          <select  name="item[]" class="custom-select" name="select" id="inputGroupSelect02">
            <?php
                while($row = mysqli_fetch_array($result)){
            ?>
              <option value='<?php echo $row["item_id"];?>' > <?php echo $row["item_name"];?></option>
            <?php
              }
          ?>
        </select>
      </div>

      <div class="col">
        <input type="number" id="price" name="price[]" readonly>
      </div>

      <div class="col">
        <input type="number" id="quantity" name="quantity[]" min="1" >
      </div>

      <div class="col-md-2 d-flex align-items-center text-bold">
          <div>$<span 
          
          class="total">0</span></div>
        <!-- <input type="text" class="form-control" name="total[]" id="total" placeholder="Total"> -->
      </div>

      <div class="col">
        <button class ="btn btn-primary"><i class="fa-solid fa-trash"></i></button>
        <!-- <input type="text" class="form-control" name="action[]" id="action" placeholder="Action">  -->
      </div>
    
     <div>
        <button class="btn btn-secondary btn-sm" id="additem">Add item</button><br>
      </div>  
       
  </div>

  

<script>

  $(document).ready(function(){
    $(document).on('click', "#additem", function(e){
      e.preventDefault();
      var control= $("#form");
      var clone= $(control).clone();
      
      $(clone).find("[name='item[]']").val("0");
      $(clone).find("[name='price[]']").val("0");
      $(clone).find("[name='quantity[]']").val("0");
      $(clone).find("[name='total[]']").val("0");
      $(clone).find("[name='action[]']").val("0");

       var template =$(".template").last();

      var dataCount=$(template).attr("dataCount");
      var count=parseInt(dataCount);
      count = count + 1;
      $(clone).attr('dataCount',count);
      $(clone).removeAttr("id");
      $(clone).attr('id',count);
     

      clone.insertBefore(this);

  
    
    });
    $("[name='item[]']").change(function(){
      // var id = $(this).closest(".template").attr("id");
      // alert(id);

      var item_id=$(this).val();
      $.get("../forms.php?object=InventoryItem&action=getItem&item_id="+item_id,function(data){
        $("[name='price[]']").val(data);
      })
    });
  
    $(document).on('click', "#test", function(e){
     alert($(".template").length);
    });
  })

// }
</script>
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
</div>
</div>
 
    
  
  </form>
  
  

    
    
    
          