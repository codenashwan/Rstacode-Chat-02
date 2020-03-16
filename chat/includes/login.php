<?php
include 'config.php';
$username =x($_POST['username']);
$password  = x($_POST['password']);


if(empty($username) || empty($password)){
    exit("تکایە خانەکان بە وردی پڕ بکەوە");
}
$password = hash('gost' , $password);
$success = mysqli_query($db  , "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
if(mysqli_num_rows($success) == 1){
    while($row = mysqli_fetch_assoc($success)){
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
    }
    exit("success");
}else{
    exit("بەکارهێنەر بوونی نییە");
}