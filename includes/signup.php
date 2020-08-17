<?php
session_start();
require "signup-script.php";
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
    <form action="signup.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="first_name" placeholder="First name" required>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
    </div>
  </div>
  <div class="form-group my-3">
    <label for="exampleFormControlFile1">Choose Avatar</label>
    <input type="file" class="form-control-file" name="avatar" id="exampleFormControlFile1" required>
  </div>
  <div class="form-group mt-3">
    <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="pass" id="formGroupExampleInput2" placeholder="Password" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="repeat_pass" id="formGroupExampleInput3" placeholder="Repeat Password" required>
  </div>
  <button class="btn btn-info px-md-4" type="submit" name="submit">Register</button> 
  <p class="my-2">Уже зарегистрированы? <a href="signin.php">Войти</a></p>
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