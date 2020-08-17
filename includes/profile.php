<?php
session_start();
require_once "../posts/upload.php";

if(!$_SESSION['user']){
  header("Location:signin.php");
}
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
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1><a href="/">Instagram 2.0</a></h1>
        </div>
        <div class="nav-links">
                <ul>
                    <li><a href="logout.php" class="btn btn-info">Sign Out</a></li>
                </ul>
        </div>
        </header>
        <main>
           <div class="user__info">
               <div class="user__img">
                   <img  class="img-fluid" style="object-fit:cover;" src="../media/<?=$_SESSION['user']['avatar']?>" alt="user Img">
              </div>
               <div class="user__txt__info">
                   <h1><?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']?></h1>
                   <div class="user__add_photo"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Photo
              </div>
</button></div>
           </div>
           <?php
           $posts = mysqli_query($conn, "SELECT * FROM `user_photos` ORDER BY `id` DESC");

           while($post = mysqli_fetch_assoc($posts)){
            ?>
        <div class="user__photos d-flex">
        <div class="card border-0 mx-2 bg-light" style="width: 18rem;">
            <img src="../posts/post_img/<?php echo $post['user_image']?>" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text"><?php echo $post['user_txt']?></p>
        </div>
        </div>
            <?php
           }
           ?>


        </main>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="profile.php" method="post" enctype="multipart/form-data">
      <input type="file" name="post_file" required>
    <textarea name="post_txt" class="mt-3" cols="35" rows="3" placeholder="Your text" style="resize:none;" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit_post" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>