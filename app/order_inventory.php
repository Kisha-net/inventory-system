<?php
include 'base.php';
include '../classes/Database.php';


$order_id = '';
if(isset($_GET["order"])){
    $item_id =$_GET["order"] ;
}


if($order_id==''){
        $action="add_order";
        $order_id = '';
        $order_name = '';
        $total = '';
        $customer_name = '';
        $order_date ='';
        $delivery_date = '';
        
}else{

        $action = $_GET["action"];
        $action="update_order";
        $conn = Database::connect(); 
        $sql = "SELECT * FROM orders WHERE order_id ='$order_id' ";
        $result = mysqli_query($conn,$sql);
        echo $action;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $order_id = $row["order_id"];
            $order_name = $row["order_name"];
            $total = $row["total"];
            $customer_name = $row["customer_name"];
            $order_date = $row["order_date"];
            $delivery_date = $row["delivery_date"];
            }
    
    }

    ?>

<form action="../forms.php" method="post" class="orders">
  <div class="row form-group">
    <input type="hidden" value="InventoryOrder" name="object">
    <input type="hidden" value="<?=$order_id;?>" name="order_id">
    <input type="hidden" value="<?=$action;?>"  name="action">


    <div class="form-group col">
        <!-- <div class="input-group mb-3"> -->
        <b><label  for="customer_name" >Customer Name :</label><br></b>
          <?php
        // include '../classes/Database.php';
        $conn = Database::connect(); 
        $sql = "SELECT * FROM customers";
        $result = mysqli_query($conn,$sql);
        
        ?>
        <select class="form-control" value="<?=$customer_name;?>" name="customer_name" class="custom-select" id="inputGroupSelect02">
        <option value="">Pick a customer</option>
        <?php
            while($row = mysqli_fetch_array($result)){
        ?>
          <option value='<?php echo $row["customer_id"];?>' ><?php echo $row["names"];?></option>
        <?php
          }
      ?>
      </select>
    </div><br>
    
    <div >
        <input type="hidden" class="form-control" name ="order_date" value="<?=date("d/m/Y")?>" id="order_date">
    </div>
 


    <div class="form-group col">
        <b><label for="delivery_date">Delivery Date:</label></b>
        <input type="date" class="form-control"  required name ="delivery_date" value="<?=$delivery_date;?>" id="delivery_date">
    </div>
  </div>



  

  <div class="form-group row">
      <div class="col-4">
          <b><label for="Item">Item</label></b>
      </div>
      <div class="col-2">
        <b><label for="price">Price</label></b>
      </div>
      <div class="col-2">
        <b><label for="quantity">Quantity</label></b>
      </div>
      <div class="col-2">
        <b><label for="total">Total</label></b>
      </div>
      <div class="col-2">
        <b><label for="Item">Action</label></b>
      </div>
  </div>
  <div class="form-group row template" id="form" name="form" dataCount="1">
    <div class="col-4">
          <?php
        $conn = Database::connect(); 
        $sql = "SELECT * FROM items";
        $result = mysqli_query($conn,$sql);


        ?>
          <tr>
        <td>
        <select  name="items_"  class="custom-select item"  id="inputGroupSelect02">
          <option value='' > Select an item</option>
          <?php
              while($row = mysqli_fetch_array($result)){
          ?>
            <option value='<?php echo $row["item_id"];?>'> <?php echo $row["item_name"];?></option>
          <?php
            }
        ?>
      </select>
    </div>

    <div class="col-2">
      <input class="form-control" type="number" type="hidden" id="price" name="price[]" readonly>
    </div>

    <div class="col-2 iquantity">
      <input class="form-control" type="number" id="quantity" name="quantity[]" min="1" >
    </div>

    <div class="col-2 align-items-center text-bold">
        <div>$<span 
        
       name ="total[]" class="total">0</span></div>
      <!-- <input class="form-control" type="text" class="form-control" name="total[]" id="total" placeholder="Total"> -->
    </div>

    <div class="col-2 deleteItemButton">
      <button type="button" class ="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
      <!-- <input class="form-control" type="text" class="form-control" name="action[]" id="action" placeholder="Action">  -->
    </div>
  
  </div><br>
  <div id="button-container">
    <button class="btn btn-primary btn-sm" id="additem">Add item</button><br>
  </div>   

  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h2>Total</h2>
    </div>
    <div >
      <h2>$<span id="total">0</span></h2>
    </div>
  </div> 

  <div class="form group row pt-4">
    <button type="submit"  class="btn btn-success btn-lg btn-block" href="orders.php">Complete Order</button><br>
  </div>  

  

<script>

  $(document).ready(function(){
    $(document).on('click', "#additem", function(e){
      e.preventDefault();
      var control= $("#form");
      var clone= $(control).clone();
      
      $(clone).find("[name='items_']").val("0");
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
     

      clone.insertBefore("#button-container");

  
    
    });
    $(document).on('change', '[name="items_"]', function(e){
    
      var item_id=$(this).val();
      var template = $(this).closest(".template");

      $.get("../forms.php?object=InventoryItem&action=getItem&item_id="+item_id,function(data){
        $(template).find("[name='price[]']").val(data);
         $(document).on("change", "[name='quantity[]']", function(e){
        var row = $(this).closest(template);
          var price = $(row).find("[name='price[]']").val();
          var x = parseInt(price);
          var quantity = $(row).find("[name='quantity[]']").val();
          var y = parseInt(quantity);
          var total = price * quantity;
          $(row).find("[name='total[]']").html(total);

          
         })
       
        

      })
      

      $(document).on("click", ".deleteItemButton", function(e){
        e.preventDefault();
          template.remove();
        
    });

  
    });
  
    
  })

</script>
  
</div>
</div>
 
    
  
  </form>
  
  

    
    
    
          