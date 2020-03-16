<?php
include 'config.php';
if(isset($_POST['friend_id'])){
$friend_id = x($_POST['friend_id']);

if(empty($friend_id)){
    exit("fail");
}else{
$check_request = mysqli_query($db  , "SELECT * FROM `send_request` WHERE (`request_id` = '$userid' AND `response_id` = '$friend_id') OR (`request_id` = '$friend_id' AND `response_id` = '$userid')");
if(mysqli_num_rows($check_request) == 0){
$success = mysqli_query($db , "INSERT INTO `send_request`(`request_id`,`response_id`, `is_accept`) VALUES ('$userid','$friend_id',0)");
if($success){
    exit("success");
}else{
    exit("fail");
}
}
}
}else{
    exit("fail");
}
?>
