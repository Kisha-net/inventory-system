<!doctype html>
<html lang="en">
  <?php
include 'includes/head.php';

?>
  <body>
    <section class="container-fluid bg row justify-content-center">
      <div class="col-4">
        <form class="form-container"action="../forms.php" method="post" >
          <input type="hidden" value="Authenticate" name="object">
          <input type="hidden" value="login" name="action">

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </section>

<?php
  include 'includes/footer.php';
?>
