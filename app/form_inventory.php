<?php
include 'base.php';
?>
<section class="container-fluid bg row justify-content-center">
    <div class="col-6 items">
    <form action="../forms.php" method="post">
        <input type="hidden" value="InventoryItem" name="object">
        <input type="hidden" value="addItem" name="action">
        <div class="form-group">
        <label for="Itemname">Item Name</label>
        <input type="text" class="form-control" id="itemname" name ="item_name">
        </div>
        <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name ="price" id="price">
        </div>
        <div class="form-group col-md-4">
            <label for="inputStatus">Stock</label>
            <select id="inputStatus" name ="stock" class="form-control">
            <option>Available</option>
            <option>Depleted</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</section>
