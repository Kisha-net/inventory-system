<!doctype html>
<html lang="en">
<?php
    include '../app/includes/head.php';
?>
 <body>
<nav class="navbar navbar-dark bg-primary fixed-top flex-md-nowrap p-0 shadow">
    <a class ="navbar-brand col-sm-2 col-md-2 mr-0" href="#">Inventory Dashboard</a>
    <input type="text" class="form-control form-control-primary w-100" type="search" placeholder="Search" aria-label="Search">
        <ul class ="navbar-nav px-3">
            <li class ="nav-item text-nowrap">   
                <form id="logout_form" name="logout" method="post" action="../index.php" >
                    <a class="nav-link" href="../logout.php" name="logout" id="logout" onclick="logout()" >LOG OUT</a>
                    <input type="hidden" value="Authenticate" name="object">
                    <input type="hidden" value="logout" name="action">
                </form>
            </li>
        </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light d-none d-md-block sidebar">
            <div class ="left-sidebar">
            <ul class="nav flex-column">
            <li class="nav-item">
                    <a class="nav-link active" href="../app/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../app/inventory_items.php">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../app/orders.php">Orders</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="../app/customers.php">customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10"> 

 