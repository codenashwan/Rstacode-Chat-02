<?php
include 'config.php';
$username =x($_POST['username']);
$password  = x($_POST['password']);
$email = x($_POST['email']);
$age = x($_POST['age']);
$gender = x($_POST['gender']);


if(empty($username) || empty($password) || empty($email) || empty($age) || empty($gender)){
    exit("تکایە خانەکان بە وردی پڕ بکەوە");
}

if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
    exit("ناوی بەرکاهێنەر گونجاو نییە");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("ئیمەیل گونجاو نییە");
}

if( $age > 100 || $age < 14){
    exit("تەمەنت گونجاو نییە");
}


$checkUser = mysqli_query($db , "SELECT `username` FROM `user` WHERE `username` = '$username'");
if(mysqli_num_rows($checkUser) > 0){
    exit("ناوی بەکارهێنەر بوونی هەیە");
}

$checkEmail = mysqli_query($db , "SELECT `email` FROM `user` WHERE `email` = '$email'");
if(mysqli_num_rows($checkEmail) > 0){
    exit("ئیمەیل  بوونی هەیە");
}


//success
$password = hash('gost' , $password);
$success = mysqli_query($db , "INSERT INTO `user`(`username`,`email`,`password`,`age`,`gender`) VALUES ('$username','$email','$password','$age','$gender')");
if($success){
    exit("success");
}