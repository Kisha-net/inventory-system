
<!-- <?php
include 'app/includes/head.php';
session_destroy();
echo $_SESSION['username'];
header("location:app/login.php");
?> -->
<form action="">
    <div class="form-row">
      <div class="col-7">
        <input type="text" class="form-control" placeholder="Item Name">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Price">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="status">
      </div>
    </div>
</form>

<?php
include '../classes/Authenticate.php';

echo "Login Succesful";
echo "Welcome to the Dashboard";
 echo $_SESSION["username"];
?> -->
<?php 
include 'includes/head.php';

  if (isset($_SESSION['user_id'])) {
    echo 'Welcome '.$_SESSION['username'];
    header("location:inventory_items.php");
  }else{
    echo 'Invalid';
  }
  ?> 
  <section class="container-fluid bg row justify-content-center dashboard">
    <div class="jumbotron">
        <?php
         if (isset($_SESSION['user_id'])) {
             echo '<h1 class="display-4">Hello </h1>';
            echo 'Welcome '.$_SESSION['username'];
            echo "Welcome to the Dashboard";
            header("location:inventory_items.php");
          }else{
            echo 'Invalid';
          }
        ?>
        <h1 class="display-4">Hello </h1>
        <p class="lead">WELCOME TO THE DASHBOARD</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
</section>