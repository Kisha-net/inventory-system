<?php
include 'base.php';
include '../classes/Database.php';

$item_id = '';
if(isset($_GET["item"])){
    $item_id =$_GET["item"] ;
}


if($item_id==''){
        $action="addItem";
        $item_name ='';
        $stock = '';
        $price = '';
}else{

        $action = $_GET["action"];
        $action="updateItem";
        $conn = Database::connect(); 
        $sql = "SELECT * FROM items WHERE item_id ='$item_id' ";
        $result = mysqli_query($conn,$sql);
        echo $action;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
              $item_id = $row["item_id"];
              $item_name = $row["item_name"];
              $stock = $row["stock"];
              $price = $row["price"];
            }
    
    }
?>
    <div class="col-6 items">
    <form action="../forms.php" method="post">
        <input type="hidden" value="InventoryItem" name="object">
        <input type="hidden" value="<?=$item_id;?>" name="item_id">
        <input type="hidden" value="<?=$action;?>" name="action">
        <div class="form-group">
        <label for="Itemname">Item Name </label>
        <input type="text" class="form-control" value="<?=$item_name;?>" required id="itemname" name ="item_name">
        </div>
        <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" value="<?=$price;?>" required name ="price" id="price">
        </div>
        <div class="form-group col-md-4">
            <label for="inputStatus">Stock</label>
            <select id="inputStatus" name ="stock" class="form-control">
            <option value="Available">Available</option>
            <option value="Depleted">Depleted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</section>
