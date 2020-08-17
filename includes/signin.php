<?php
session_start();
require_once "signin-script.php";

if($_SESSION['user']){
  header("Location: profile.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container-all" style="border-radius:20px;">
    <form method="post">
  <div class="form-group mt-3">
    <input name="email" type="text" class="form-control" id="formGroupExampleInput" placeholder="Email">
  </div>
  <div class="form-group">
    <input name="pass" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password">
  </div>
  <button class="btn btn-info px-md-4" type="submit" name="log_submit">Login</button> 
  <p class="my-2">Ещё не зарегистрированы? <a href="./signup.php">Регистрация</a></p>
</form>
<?php 

if($_SESSION['msg']){
  echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
}
unset($_SESSION['msg']);
  ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>