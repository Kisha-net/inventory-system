<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="vendor/bootstrap/css/cerulean.theme.min.css">
	

	<title>Document</title>
	<link rel="stylesheet" href="../assets/Scripts/items.css">
</head>
<body>
	<!-- Page Content -->
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
		</div>
		 <div class="col-lg-10">
			<section class="items justify-content-center">
				  <div class="card-header "><h2>Item Details</h2></div>
				  <div class="card-body">
		
					<!-- Tab panes for item details and image sections -->
					<section class="tab-content-main">
					<div class="tab-content" class="col-4" >
						<div id="itemDetailsTab" class="container-fluid tab-pane active">
							<br>
							<!-- Div to show the ajax message from validations/db submission -->
							<div id="itemDetailsMessage">

							<form action="classes/iInventory_item.php" method="post">
							<input type="hidden" value="Authenticate" name="object">
    						<input type="hidden" value="login" name="action">
							  <div class="form-row">
								<div class="form-group col-md-3" style="display:inline-block">
								  <label for="itemDetailsItemNumber">Item Number</label>
								  <input type="text" class="form-control" name="itemid" id="itemid" autocomplete="off">
								</div><br>
								<div class="form-group col-md-6">
									<label for="itemDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
									<input type="text" class="form-control" name="itemname" id="itemname" autocomplete="off">
							 </div><br>
								<div class="form-group col-md-3">
								  <label for="itemDetailsProductID">Product ID</label>
								  <input class="form-control invTooltip" type="number" readonly  id="productid" name="productid" title="This will be auto-generated when you add a new item">
								</div><br>
							
							  
								  <div class="form-group col-md-2">
									<label for="itemDetailsStatus">Status</label>
									<select id="itemDetailsStatus" name="status" class="form-control chosenSelect"title="This will be auto-generated when you add a new item">
										<?php include('inc/statusList.html'); ?>
									</select>
								  </div><br>
							  </div>
								<div class="form-group col-md-3">
									<div id="imageContainer"></div>
								</div>
							  </div>
							  <button type="submit" id="addItem" class="btn btn-success">Add Item</button>
							  <button type="button" id="updateItemDetailsButton" class="btn btn-primary">Update</button>
							  <button type="button" id="deleteItem" class="btn btn-danger">Delete</button>
							  <button type="reset" class="btn" id="itemClear">Clear</button>
							</form>
						</div>
						<div id="itemImageTab" class="container-fluid tab-pane fade">
							<br></section>
							<div id="itemImageMessage"></div>
							  <br>
							</form>
						</div>
					</div>
			    </div> 
			</div>
		 </section>
	</form>
</body>
</html>
    