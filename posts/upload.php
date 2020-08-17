<?php
session_start();
require_once "../includes/db.php";

$post_path = time();
$post_image ="$post_path".$_FILES['post_file']['name'];
$tmp_post = $_FILES['post_file']['tmp_name'];
$post_txt =mysqli_real_escape_string($conn, $_POST['post_txt']);

move_uploaded_file($tmp_post, "../posts/post_img/$post_image");

if(isset($_POST['submit_post'])){
    if(!empty($post_image) || !empty($post_txt)){
        mysqli_query($conn, "INSERT INTO `user_photos`(`user_image`,`user_txt`) VALUES('$post_image', '$post_txt')");
        header("Location:profile.php");
    }
}

?>