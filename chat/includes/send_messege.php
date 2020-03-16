<?php
include 'config.php';
$content= x($_POST['content']);
$friend_id = x($_POST['friend_id']);
$query = mysqli_query($db , "INSERT INTO `meseege`(`send_id` , `receive_id`,`messege_content`) VALUES ('$userid','$friend_id','$content')");
if($query){
    exit("success");
}