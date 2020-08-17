<?php
session_start();
require_once "db.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$path = time();
$avatar = "$path".$_FILES['avatar']['name'];
$img_tmp = $_FILES['avatar']['tmp_name'];
$email = $_POST['email'];
$pass = crypt(CRYPT_SHA256,$_POST['pass']);
$rep_pass = crypt(CRYPT_SHA256, $_POST['repeat_pass']);

move_uploaded_file($img_tmp, "../media/$avatar");

if(isset($_POST['submit'])){
    if(empty($first_name) || empty($last_name) || empty($avatar) || empty($email) || empty($pass) || empty($rep_pass)){
        $_SESSION['msg']='Не все поля заполнены!';
    }
    else{
        if($pass == $rep_pass){
            $val_ins ="INSERT INTO `user_info` (`firstname`,`lastname`,`avatar`,`email`,`password`) VALUES ('$first_name', '$last_name', '$avatar', '$email', '$pass')";
            mysqli_query($conn, $val_ins);
            header("Location:signin.php");
        }
        else{
            $_SESSION['msg']='Пароли не совпадают!';
        }
        
    }
}


?>