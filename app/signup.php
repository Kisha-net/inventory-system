<!doctype html>
<html lang="en">
<?php
include 'includes/head.php';
?>


  <section class="container-fluid bg row justify-content-center">
    <div class="col-4">
      <form class="form-container" action="../forms.php" method="post">
        <input type="hidden" value="Authenticate" name="object">
        <input type="hidden" value="signup" name="action">
        <div class="form-group">
          <label for="username">User Name</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="passwordRepeat" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>
  </section>

  <?php
  include 'includes/footer.php';
  ?>