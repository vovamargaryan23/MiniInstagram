<?php
session_start();
require_once "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1><a href="/">Instagram 2.0</a></h1>
        </div>
        <div class="nav-links">
        <?php
        if($_SESSION['user']){
          ?>
            <ul>
              <li><a href="includes/logout.php" class="btn btn-info">Sign Out</a></li>
            </ul>
          <?php
        }
        else{
          ?>
                <ul>
                    <li><a href="includes/signin.php" class="btn btn-light">Sign In</a></li>
                    <li><a href="includes/signup.php" class="btn btn-info">Sign Up</a></li>
                </ul>
          <?php
        }
        ?>

        </div>
        </header>
        <main>
            <div class="container-all">
            <?php
           $posts = mysqli_query($conn, "SELECT * FROM `user_photos` ORDER BY `id` DESC");

           while($post = mysqli_fetch_assoc($posts)){
            ?>
            <div class="card border-0 my-4" style="width: 30rem;">
                    <img src="../posts/post_img/<?php echo $post['user_image']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text"><?php echo $post['user_txt']?></p>
                    </div>
                  </div>
            <?php
           }
           ?>
            </div>
        </main>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>