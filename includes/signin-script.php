<?php
session_start();
require_once "db.php";

$email = $_POST['email'];
$pass = crypt(CRYPT_SHA256, $_POST['pass']);
$login_query = mysqli_query($conn, "SELECT * FROM `user_info` WHERE `email` = '$email' AND `password` = '$pass'");

if(mysqli_num_rows($login_query) > 0){
    $user = mysqli_fetch_assoc($login_query);

    $_SESSION['user'] = [
        "id"=>$user['id'],
        "firstname" => $user['firstname'],
        "lastname" => $user['lastname'],
        "avatar" =>$user["avatar"],
    ];

    header("Location: profile.php");
}
else{
    if(isset($_POST['log_submit'])) $_SESSION['msg'] = 'Не верный логин или пароль!';
}

?>