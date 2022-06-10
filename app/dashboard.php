<?php 
include 'includes/head.php';
include 'base.php';

?> 
<section class="container-fluid bg row justify-content-center dashboard ">
    <div class="jumbotron">
        <?php
        if (isset($_SESSION['user_id'])) {
            echo "<h1 class='display-4'>Hello"."," .$_SESSION['username'] ."</h1>";
            echo '<p class="lead">WELCOME TO THE SHARK DASHBOARD</p>';
        //   }else{
        //     echo 'Invalid';
         }
        ?>
        <hr class="my-4">
        <p>You can easily access,update and view all the Inventories bla bla bla bla bla bla bla bla bla bla bla bla.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="learnmore.php" role="button">Learn more</a>
        </p>
    </div>
</section>